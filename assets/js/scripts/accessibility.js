/* eslint-disable */
/*
 * Accessibility enhancements for iyte_dev theme.
 * Imported from assets/js/main.js into the Webpack bundle.
 * build pipeline. Uses jQuery (already enqueued as a dependency of main).
 *
 * Responsibilities:
 *   1. Mobile menu toggle: keep aria-expanded in sync.
 *   2. Manşet (#featured_news) slider: add pause/play, ARIA, hover/focus
 *      pause, keyboard navigation, prefers-reduced-motion handling.
 */

(function ($) {
    'use strict';

    var TR = (document.documentElement.lang || '').toLowerCase().indexOf('tr') === 0;
    var t = {
        openMenu:   TR ? 'Menüyü aç'    : 'Open menu',
        closeMenu:  TR ? 'Menüyü kapat' : 'Close menu',
        pause:      TR ? 'Slayt geçişini durdur' : 'Pause slideshow',
        play:       TR ? 'Slayt geçişini başlat' : 'Play slideshow',
        prev:       TR ? 'Önceki slayt' : 'Previous slide',
        next:       TR ? 'Sonraki slayt' : 'Next slide',
        slide:      TR ? 'Slayt'        : 'Slide',
        of:         TR ? 'toplam'       : 'of',
        carouselLabel: TR ? 'Öne çıkan haberler' : 'Featured news'
    };

    /* ----------------------------------------------------------------
     * Mobile menu aria-expanded sync
     * ---------------------------------------------------------------- */
    $(function () {
        var $mobileMenu = $('#mobilemenu');
        if (!$mobileMenu.length) {
            return;
        }

        function syncMobileMenuState() {
            var isOpen = !$mobileMenu.hasClass('hidden');
            $('.toggle-mobile-menu > a').each(function () {
                var $btn = $(this);
                $btn.attr('aria-expanded', isOpen ? 'true' : 'false');
                if ($btn.closest('#mobilemenu').length === 0) {
                    $btn.attr('aria-label', isOpen ? t.closeMenu : t.openMenu);
                }
            });
        }

        $('.toggle-mobile-menu > a').on('click keydown', function (e) {
            if (e.type === 'keydown' && e.key !== 'Enter' && e.key !== ' ') {
                return;
            }
            if (e.type === 'keydown') {
                e.preventDefault();
                $(this).trigger('click');
                return;
            }
            // Defer to let existing handler run first (it toggles .hidden).
            window.setTimeout(syncMobileMenuState, 0);
        });

        syncMobileMenuState();
    });

    /* ----------------------------------------------------------------
     * Submenu aria-expanded sync (mobile + desktop)
     * Walker outputs aria-expanded="false" on parent links;
     * we flip it when the submenu opens/closes.
     * ---------------------------------------------------------------- */
    $(function () {
        // Mobile: click toggles .open on .menu__list--submenu
        $('#mobilemenu .menu__item--has-children > a').on('click', function () {
            var $a = $(this);
            window.setTimeout(function () {
                var isOpen = $a.parent().find('.menu__list--submenu').first().hasClass('open');
                $a.attr('aria-expanded', isOpen ? 'true' : 'false');
            }, 0);
        });

        // Desktop: hover/focus reveals submenu via CSS;
        // listen for focusin/focusout on parent <li> to keep ARIA in sync.
        $(document).on('focusin mouseenter', '.menu__item--has-children', function () {
            $(this).children('a').attr('aria-expanded', 'true');
        });
        $(document).on('focusout mouseleave', '.menu__item--has-children', function () {
            $(this).children('a').attr('aria-expanded', 'false');
        });
    });

    /* ----------------------------------------------------------------
     * Manşet slider a11y
     * Slider id: #featured_news (initialised by home.js via slippry).
     * We wait for the slippry-wrapped DOM, then add controls + ARIA.
     * ---------------------------------------------------------------- */
    $(function () {
        var $slider = $('#featured_news');
        if (!$slider.length) {
            return;
        }

        var reducedMotion = window.matchMedia &&
            window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function enhance() {
            var $wrapper = $slider.closest('.sy-box');
            if (!$wrapper.length) {
                return false;
            }
            if ($wrapper.data('a11y-enhanced')) {
                return true;
            }
            $wrapper.data('a11y-enhanced', true);

            // Carousel landmark
            $wrapper.attr({
                'role': 'region',
                'aria-roledescription': 'carousel',
                'aria-label': t.carouselLabel
            });

            // Mark slides
            var $slides = $wrapper.find('.sy-slide, article');
            $slides.attr({
                'role': 'group',
                'aria-roledescription': TR ? 'slayt' : 'slide'
            });
            $slides.each(function (i) {
                $(this).attr('aria-label', t.slide + ' ' + (i + 1) + ' ' + t.of + ' ' + $slides.length);
            });

            // Live region for slide changes (polite)
            var $live = $('<div class="screen-reader-text" aria-live="polite" aria-atomic="true"></div>');
            $wrapper.append($live);

            // Label slippry's native prev/next controls (no visual change).
            $wrapper.find('.sy-controls .sy-prev a').attr('aria-label', t.prev);
            $wrapper.find('.sy-controls .sy-next a').attr('aria-label', t.next);

            // Insert pause/play toggle into slippry's native .sy-pager as an
            // additional <li>, so it inherits the dot styling already applied
            // to the pager bullets by the theme/slippry stylesheet.
            var paused = false;
            var $pager = $wrapper.find('.sy-pager');
            var $pauseLi = $('<li class="sy-pause is-playing"></li>');
            var $pauseLink = $('<a href="#" role="button" aria-pressed="false"></a>');
            $pauseLink.attr('aria-label', t.pause);
            $pauseLi.append($pauseLink);
            if ($pager.length) {
                // Append to the END of the pager DOM so slippry's
                // updatePager() — which uses `$('.sy-pager li')[active.index()]`
                // to highlight the active dot — keeps the original
                // 0..N-1 indexing intact. CSS uses flex `order: -1` on
                // .sy-pause to make it *visually* leading.
                $pager.append($pauseLi);
            }

            // Trigger slippry's built-in controls when our keyboard handler
            // fires (no custom prev/next buttons rendered).
            function clickInternal(selectorList) {
                var i;
                for (i = 0; i < selectorList.length; i++) {
                    var $el = $wrapper.find(selectorList[i]);
                    if ($el.length) {
                        $el.first().trigger('click');
                        return true;
                    }
                }
                return false;
            }

            function setPaused(state) {
                paused = state;
                $pauseLink.attr({
                    'aria-pressed': state ? 'true' : 'false',
                    'aria-label': state ? t.play : t.pause
                });
                $pauseLi
                    .toggleClass('is-paused', state)
                    .toggleClass('is-playing', !state);
                // Drive slippry's real public API. home.js stashes the
                // slippry-augmented jQuery instance on window._iyteSlider
                // because the .startAuto / .stopAuto methods live on that
                // particular instance, not on a fresh $('#featured_news').
                var sliderApi = window._iyteSlider;
                if (sliderApi) {
                    try {
                        if (state && typeof sliderApi.stopAuto === 'function') {
                            sliderApi.stopAuto();
                        } else if (!state && typeof sliderApi.startAuto === 'function') {
                            sliderApi.startAuto();
                        }
                    } catch (err) { /* noop */ }
                }
            }

            $pauseLink.on('click', function (e) {
                e.preventDefault();
                setPaused(!paused);
            });

            // Pause on focus within carousel (uses real slippry API).
            $wrapper.on('focusin', function () {
                var sliderApi = window._iyteSlider;
                if (sliderApi && typeof sliderApi.stopAuto === 'function') {
                    sliderApi.stopAuto();
                }
            });
            $wrapper.on('focusout', function (e) {
                if (paused) { return; }
                if (!$wrapper[0].contains(e.relatedTarget)) {
                    var sliderApi = window._iyteSlider;
                    if (sliderApi && typeof sliderApi.startAuto === 'function') {
                        sliderApi.startAuto();
                    }
                }
            });

            // Keyboard nav: ArrowLeft / ArrowRight when focus is in carousel
            $wrapper.on('keydown', function (e) {
                if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') {
                    return;
                }
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    clickInternal(['.sy-prev a', '.sy-prev', '.sy-controls a.prev']);
                    announceCurrent();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    clickInternal(['.sy-next a', '.sy-next', '.sy-controls a.next']);
                    announceCurrent();
                }
            });

            function announceCurrent() {
                var $active = $wrapper.find('.sy-active, .active').first();
                if ($active.length) {
                    var idx = $slides.index($active) + 1;
                    var heading = $active.find('h1, h2, h3').first().text() ||
                                  $active.find('a').first().text() || '';
                    heading = $.trim(heading).slice(0, 120);
                    $live.text(t.slide + ' ' + idx + ' ' + t.of + ' ' + $slides.length +
                               (heading ? ': ' + heading : ''));
                }
            }

            // Respect reduced motion: auto-pause from the start.
            if (reducedMotion) {
                setPaused(true);
            }

            return true;
        }

        // Slippry initialises asynchronously; poll briefly.
        var attempts = 0;
        var poll = window.setInterval(function () {
            attempts++;
            if (enhance() || attempts > 40) {
                window.clearInterval(poll);
            }
        }, 150);
    });

})(jQuery);
