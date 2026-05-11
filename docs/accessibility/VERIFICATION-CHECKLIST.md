# Erişilebilirlik Doğrulama Kontrol Listesi

Build + deploy + cache temizleme sonrası sırayla yapılacak testler.

---

## 1. Görsel Regresyon Kontrolü (zorunlu)

Aşağıdaki sayfaların **canlı production** versiyonlarını incognito modda açın
ve değişiklik öncesi (deploy öncesi alınmış) ekran görüntüsü ile karşılaştırın.
Hiçbir görsel fark olmamalı.

- [ ] `https://iyte.edu.tr/` — anasayfa, masaüstü görünüm
- [ ] `https://iyte.edu.tr/` — anasayfa, mobil görünüm (DevTools 375px)
- [ ] `https://iyte.edu.tr/?p=<haber-id>` — bir haber detay
- [ ] `https://iyte.edu.tr/hakkinda/` — bir sayfa
- [ ] `https://iyte.edu.tr/?s=test` — arama sonuçları
- [ ] `https://iyte.edu.tr/404-not-real-url` — 404 sayfası
- [ ] `https://iyte.edu.tr/?p=<manset-id>` — bir manşet detay
- [ ] `https://en.iyte.edu.tr/` — İngilizce anasayfa

---

## 2. Klavye Erişilebilirlik Testi

Anasayfayı yükleyin, mouse'u **hiç kullanmadan** Tab tuşu ile sayfayı dolaşın.

- [ ] İlk Tab basışında "Ana içeriğe geç" / "Skip to main content" linki sol üstte görünüyor.
- [ ] Enter'a basıldığında main içeriğe atlıyor.
- [ ] Tüm linkler ve butonlar focus alabiliyor — atlanan element yok.
- [ ] Her focus'lanan elementte sarı bir outline (3px solid #ffd400) görünüyor.
- [ ] Mobile menü açma butonu (375px viewport): Enter veya Space ile menü açılıyor; aria-expanded "true" oluyor.
- [ ] Menü açıkken Tab tuşu ile menü öğeleri dolaşılabiliyor.
- [ ] Menüdeki alt menüsü olan öğelere odaklandığında submenu açılıyor.
- [ ] Manşet slider'ı kontrolleri: pause butonu, prev (‹) ve next (›) klavyeden çalışıyor.
- [ ] Manşet'e focus geldiğinde otomatik dönmesi duruyor.
- [ ] Arrow Left / Arrow Right tuşları manşette önceki/sonraki slayt'a geçiyor.
- [ ] Arama formu: input'a Tab ile odaklanılabiliyor.

---

## 3. Ekran Okuyucu Testi

**Test araçları:** NVDA (Windows, ücretsiz), VoiceOver (Mac, varsayılan).

- [ ] Sayfa yüklendiğinde "İzmir Yüksek Teknoloji Enstitüsü" başlığı (anasayfada gizli h1) okunuyor.
- [ ] Sosyal medya ikonları: "Facebook'ta İYTE, yeni pencerede açılır, link" olarak okunuyor (boş bir link değil).
- [ ] Arama formu: input için "Arama terimi" etiketi okunuyor.
- [ ] Mobile menu butonu: "Menüyü aç, button, kapalı" → "Menüyü kapat, button, açık" olarak okunuyor.
- [ ] Landmark navigasyonu (NVDA: D tuşu, VoiceOver: VO+U → Landmarks):
  - banner (header)
  - navigation: Ana menü
  - navigation: Hızlı erişim
  - navigation: Sosyal medya
  - main (main content)
  - contentinfo (footer)
- [ ] Heading navigasyonu (H tuşu): h1 (anasayfada İYTE) → h2 (Araştırma Ekosistemi, Etkinlikler, Duyurular).
- [ ] Manşet slider okunduğunda "Öne çıkan haberler, region, slayt 1 / N: <başlık>" olarak okunuyor.

---

## 4. Otomatik Tarayıcı Test Araçları

Anasayfa, bir haber detay, bir sayfa için her birinde:

### Chrome DevTools → Lighthouse → Accessibility
- [ ] Lighthouse Accessibility skoru ≥ 95
- [ ] 0 critical bulgu

### axe DevTools (Chrome eklentisi, ücretsiz)
- [ ] 0 Critical
- [ ] 0 Serious
- [ ] Moderate ve Minor bulgular için liste çıkar — manuel değerlendirme

### WAVE (https://wave.webaim.org)
- [ ] 0 Error
- [ ] Contrast Error sayısı kaydedilir — varsa müşteri ile renk düzeltmesi konuşulur
- [ ] Alerts listesi gözden geçirilir

---

## 5. Polylang / Çoklu Dil Doğrulaması

- [ ] TR anasayfa: `<html lang="tr-TR">` (View Source).
- [ ] EN anasayfa: `<html lang="en-US">`.
- [ ] Skip-link iki dilde doğru ("Ana içeriğe geç" / "Skip to main content").
- [ ] Sosyal ikon aria-label'ları iki dilde doğru.
- [ ] Erişilebilirlik Beyanı sayfaları her iki dilde mevcut ve footer'dan linkli.

---

## 6. Cache Doğrulaması

- [ ] Autoptimize cache temizlendi (Settings → Autoptimize → Save and Empty Cache).
- [ ] WP Super Cache temizlendi (Settings → WP Super Cache → Delete Cache).
- [ ] Yeni `main.css` build çıktısı `IYTE/assets/css/main.css` içinde `.skip-link` selektörünü içeriyor (`grep "skip-link" IYTE/assets/css/main.css`).
- [ ] Yeni `main.js` build çıktısı `IYTE/assets/js/main.js` içinde "accessibility" stringini içeriyor.

---

## 7. WP Accessibility Plugin Doğrulaması

- [ ] Plugin aktif (Eklentiler → Yüklü Eklentiler).
- [ ] Plugin ayarları `WP-ACCESSIBILITY-PLUGIN-SETUP.md` dokümanına göre yapılandırıldı.
- [ ] Çift skip-link YOK (sadece tema'nın eklediği var).

---

## 8. İçerik Denetimi

- [ ] `tools/alt-text-audit.php` çalıştırıldı (WP-CLI veya browser).
- [ ] `tools/reports/alt-text-audit-*.csv` çıktısı üretildi.
- [ ] Rapor içerik ekibine iletildi.

---

## 9. Erişilebilirlik Beyanı

- [ ] `/erisilebilirlik` sayfası canlı.
- [ ] `/accessibility` (EN) sayfası canlı.
- [ ] Footer'a link eklendi (her iki dilde).
- [ ] İletişim bilgileri ve son inceleme tarihi doğru.

---

## Test Tamamlama

Tüm kontroller başarılı ise:
1. Branch master'a merge edilir.
2. Lighthouse skoru, axe çıktısı, ve klavye/SR test notları kaydedilir.
3. Müşteriye teslim raporu hazırlanır.
