# Erişilebilirlik İyileştirmeleri — Değişiklik Kaydı

**Branch:** `accessibility/wcag-a-compliance`
**Tarih:** 2026-05-11
**Hedef:** WCAG 2.1 Seviye A + makul AA kazanımları
**Görsel etki:** Yok (klavye odak göstergesi hariç — sadece klavye navigasyonunda görünür)

---

## Özet

İYTE web sitesi için kapsamlı bir erişilebilirlik iyileştirme paketi.
WordPress 5.0 ve mevcut 24 plugin değiştirilmeden, sadece tema kodu ve
SCSS/JS build pipeline'ı üzerinden çalışıldı. Mevcut görsel tasarım
korundu.

---

## Değiştirilen Tema Dosyaları (PHP)

| Dosya | Değişiklik |
|---|---|
| `theme/header.php` | Skip-link, sosyal medya ikon `aria-label`'ları, search form label'ları, mobile menu `aria-expanded`/`aria-controls`, semantic `<header role="banner">`, `<nav aria-label="...">`'lar, anasayfa için gizli `<h1>` |
| `theme/footer.php` | `role="contentinfo"` + `aria-label`, sosyal ikon `aria-label`'ları, harita iframe için `role="region"` + label, contact ikonları için screen-reader text, footer butonları için `rel="noopener noreferrer"` |
| `theme/page.php` | `<main id="main-content" tabindex="-1">`, featured image div'i için `role="img" aria-label="..."` |
| `theme/single.php` | `<main id="main-content">` |
| `theme/single-fullwidth.php` | `<main id="main-content">` |
| `theme/single-manset.php` | `<main id="main-content">` |
| `theme/index.php` | `<main id="main-content">` |
| `theme/404.php` | `<main id="main-content">` wrapper |
| `theme/elements/home/_header.php` | Manşet article'larına `role="group"` + `aria-roledescription="slayt"` + `aria-label`, `<h1>` → `<h2>` (görsel korundu: CSS class-based) |
| `theme/elements/home/_arastirma.php` | `<h1 class="section-title">` → `<h2 class="section-title">` |
| `theme/elements/home/_ogrenci_olmak.php` | Aynı |
| `theme/elements/home/_guncel.php` | "Etkinlikler" ve "Duyurular" başlıkları `<h1>` → `<h2>` (CSS class-based, görsel korundu) |
| `theme/elements/manset/_header.php` | Featured image div'e `role="img" aria-label="..."` |
| `theme/library/class-moz-walker-nav-menu.php` | Alt menü olan parent öğelere `aria-haspopup="true" aria-expanded="false"`, external linklere `rel="noopener noreferrer"` |
| `theme/library/helpers/class-moz-link.php` | `add_link_rel()` artık `nofollow`'a ek olarak `noopener noreferrer` da ekliyor |
| `theme/functions.php` | (Sadece kontrol amaçlı, ek enqueue YOK — accessibility build pipeline'a entegre) |

---

## Eklenen Dosyalar

### Build Pipeline'a Entegre (otomatik derlenir)

- `assets/scss/elements/_accessibility.scss` — skip-link, `.screen-reader-text`, `:focus-visible` stilleri, `prefers-reduced-motion`, slider control button stilleri.
  - **Import noktası:** `assets/scss/main.scss` (son `@import` olarak eklendi)
  - **Build çıktısı:** `IYTE/assets/css/main.css` içine inline edilir.

- `assets/js/scripts/accessibility.js` — mobile menü `aria-expanded` sync, submenu açma/kapama ARIA güncellemeleri, manşet slider için pause/play/prev/next butonları, klavye navigasyonu, `prefers-reduced-motion` desteği.
  - **Import noktası:** `assets/js/main.js` (`import './scripts/accessibility'` olarak)
  - **Build çıktısı:** `IYTE/assets/js/main.js` bundle'ına dahil edilir.

### Tema Runtime Dışı (manuel kullanım)

- `tools/alt-text-audit.php` — WP-CLI veya browser ile çalıştırılabilen, eksik alt-text'leri tespit eden script. Çıktı: CSV.
- `tools/README.md` — araç kullanımı.
- `docs/accessibility/WP-ACCESSIBILITY-PLUGIN-SETUP.md` — Joe Dolson WP Accessibility eklentisi kurulum/yapılandırma rehberi.
- `docs/accessibility/accessibility-statement-tr.html` — Türkçe Erişilebilirlik Beyanı (WP sayfasına yapıştırılacak).
- `docs/accessibility/accessibility-statement-en.html` — İngilizce versiyon (Polylang).
- `docs/accessibility/CHANGELOG.md` — bu dosya.
- `docs/accessibility/VERIFICATION-CHECKLIST.md` — deploy sonrası test rehberi.
- `docs/accessibility/DEPLOY-GUIDE.md` — build & deploy adımları.

---

## Deploy Akışı

1. Bu branch (`accessibility/wcag-a-compliance`) review edilir, master'a merge edilir.
2. Build pipeline çalıştırılır: `npm install && npm run build` (veya `gulp prod`).
3. Build çıktısı (`../IYTE/` dizini) WordPress sunucusuna yüklenir.
4. Autoptimize + WP Super Cache cache'leri temizlenir.
5. WP Accessibility plugin admin panelinden kurulur (SETUP rehberine bakın).
6. Anonim/incognito penceresinde anasayfa + 1 haber + 1 sayfa kontrol edilir.
7. Alt-text audit script'i çalıştırılır, çıktı içerik ekibine teslim edilir.
8. Erişilebilirlik Beyanı sayfaları (TR + EN) WP admin'den oluşturulup footer menüsüne eklenir.

---

## Bilinen Sınırlılıklar

- **İç içe `<main>` etiketi:** `single.php` / `single-manset.php` dış `<main>` + `_article.php` iç `<main class="content">` kombinasyonu HTML5 spec'ine göre teknik olarak invalid. WCAG 2.2'de "Parsing" kriteri (4.1.1) artık obsolete (kaldırıldı) olduğu için bu WCAG A için kritik değildir. `_article.php`'deki iç main'in `<div>`'e dönüştürülmesi mevcut `main.content` SCSS bloğunun kapsamlı yeniden yazımını gerektirir; risk/fayda dengesi ile şu an dokunulmadı.
- **Renk kontrastı (AA):** Düşük kontrastlı yerler tespit edilirse müşteri onayı sonrası ayrı bir PR'da düzeltilecek.
- **Elementor içerikleri:** Elementor sayfalarında widget seviyesinde heading hiyerarşisi vs. erişilebilirlik kontrolü tema kodundan etkilenmez; içerik editörü düzeltmeli.
- **PDF erişilebilirliği:** Footer'daki PDF dosyaları (AI Politikası vb.) bu kapsamda değil; ayrı çalışma gerektirir.

---

## Görsel Regresyon Notu

Tüm değişiklikler "Görsel Değişmez Prensibi" ile yapıldı:
- Tag değişiklikleri (`<div id="top">` → `<header id="top">`, `<h1>` → `<h2>`) sadece class-based CSS olduğu doğrulandıktan sonra yapıldı.
- `<a>` → `<button>` dönüşümünden kaçınıldı (default browser stilleri görseli bozar) — mobile menü için `<a role="button">` tercih edildi.
- `<div>` → `<address>` dönüşümünden kaçınıldı (italic default).
- `<span>` → `<fieldset>` dönüşümünden kaçınıldı (border/padding default) — search radio group için `role="radiogroup"` tercih edildi.
- Background-image div'leri `<img>`'a dönüştürülmedi, sadece `role="img" aria-label="..."` eklendi (layout korunur).
- Klavye odak göstergesi (`:focus-visible`) yalnızca klavye navigasyonunda görünür — mouse kullanıcıları hiç görmez.
