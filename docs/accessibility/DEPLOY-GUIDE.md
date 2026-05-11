# Deploy Rehberi — Erişilebilirlik Branch'i

`accessibility/wcag-a-compliance` branch'i master'a merge edildikten sonra
production deploy adımları.

---

## 1. Build Pipeline'ı Çalıştır

```bash
# Tema kök dizininde
cd wp-content/themes/iyte_dev/

# Bağımlılıklar (zaten kuruluysa atlanabilir)
npm install
# veya
yarn install

# Production build
npm run build
# veya
gulp prod
```

**Beklenen çıktı:** `../IYTE/` dizini oluşur/güncellenir. İçinde:
- `IYTE/assets/css/main.css` (yeni: skip-link, focus-visible, screen-reader-text stilleri dahil)
- `IYTE/assets/js/main.js` (yeni: accessibility script dahil)
- `IYTE/*.php` (tema dosyaları, `@@time` placeholder'ları timestamp ile değiştirildi)

### Build doğrulama

```bash
# main.css içinde accessibility stilleri var mı?
grep -c "skip-link\|screen-reader-text\|focus-visible" ../IYTE/assets/css/main.css
# 5'ten büyük bir sayı dönmeli

# main.js içinde accessibility script var mı?
grep -c "syncMobileMenuState\|a11y-slider-controls" ../IYTE/assets/js/main.js
# 1 veya daha fazla
```

---

## 2. Production'a Aktarım

Build çıktısı (`../IYTE/`) production sunucusuna `wp-content/themes/IYTE/`
yoluna yüklenir (FTP/SFTP/rsync — mevcut deploy yönteminizle).

**ÖNEMLİ:** Aktif tema `IYTE` (build çıktısı) olmalıdır, `iyte_dev` (source)
değil. WP Admin → Görünüm → Temalar bölümünden kontrol edin.

---

## 3. Cache Temizliği

Sıralı olarak:

1. **WP Admin → Autoptimize → Cache Statistics → Delete Cache**
2. **WP Admin → Settings → WP Super Cache → Easy → Delete Cache → Delete Cache**
3. Tarayıcı önbelleğini de temizleyin veya incognito kullanın.

---

## 4. WP Accessibility Plugin

`docs/accessibility/WP-ACCESSIBILITY-PLUGIN-SETUP.md` rehberine göre:
1. Plugin'i kur ve etkinleştir.
2. Ayarları yapılandır.
3. Tekrar cache temizliği.

---

## 5. Erişilebilirlik Beyanı Sayfaları

1. WP Admin → Sayfalar → Yeni Ekle.
2. Başlık: "Erişilebilirlik Beyanı" — slug: `erisilebilirlik`.
3. **Code/Text view'ına geç**, `docs/accessibility/accessibility-statement-tr.html` içeriğini yapıştır.
4. Yayınla.
5. Polylang ile İngilizce çeviriyi oluştur: "Accessibility Statement" — slug: `accessibility`. İçeriği `accessibility-statement-en.html`'den al.
6. Footer menüsüne her iki sayfayı da ekle (WP Admin → Görünüm → Menüler → Footer Menu).

---

## 6. Alt-Text Audit

```bash
# WP-CLI ile (önerilen — sunucuda WP-CLI yüklüyse)
wp eval-file wp-content/themes/IYTE/tools/alt-text-audit.php
```

Veya tarayıcıda (admin olarak login olduktan sonra):
```
https://iyte.edu.tr/wp-content/themes/IYTE/tools/alt-text-audit.php?run=1
```
**Çalıştırdıktan sonra script'i silin** (güvenlik).

Çıktı: `tools/reports/alt-text-audit-YYYY-MM-DD.csv` — içerik ekibine teslim.

---

## 7. Doğrulama

`docs/accessibility/VERIFICATION-CHECKLIST.md` üzerinden tüm testleri yap.

---

## 8. Geri Alma (Acil)

Bir sorun çıkarsa:

```bash
# Build pipeline ile bir önceki master sürümünü geri çalıştır
git checkout master~1  # accessibility merge öncesi commit
gulp prod
# IYTE/ dizinini sunucuya yeniden yükle, cache temizle
```

Veya plugin kaynaklı sorun varsa: WP Admin → Eklentiler → "WP Accessibility" → Pasifleştir.
