# WP Accessibility Plugin Kurulum ve Yapılandırma Rehberi

Bu doküman, **WP Accessibility** (Joe Dolson) eklentisinin İYTE WordPress
sitesine kurulumu ve yapılandırması için adım adım talimatları içerir. Eklenti
ücretsizdir, aktif olarak geliştirilmektedir ve WordPress 5.0 ile uyumludur.
Tema kodundaki erişilebilirlik düzeltmelerini tamamlayıcı bir yedek
katmanı sağlar.

---

## 1. Kurulum

### Seçenek A — WordPress Admin Panelinden (önerilen)

1. `wp-admin` paneline yönetici olarak giriş yapın.
2. **Eklentiler → Yeni Ekle** menüsünü açın.
3. Arama kutusuna `WP Accessibility` yazın.
4. **Joe Dolson** tarafından geliştirilen "WP Accessibility" eklentisini
   bulun (200.000+ aktif kurulum, ★4.5+).
5. **Şimdi Yükle** → **Etkinleştir** butonlarına tıklayın.

### Seçenek B — FTP/SFTP ile manuel kurulum

1. Eklenti zip dosyasını indirin:
   <https://wordpress.org/plugins/wp-accessibility/>
2. `wp-content/plugins/wp-accessibility/` dizinine açın.
3. Admin → Eklentiler → "WP Accessibility" → **Etkinleştir**.

---

## 2. Yapılandırma

Aktivasyon sonrası **Ayarlar → WP Erişilebilirlik** menüsünden aşağıdaki
seçenekleri ayarlayın.

### 2.1 İşaretlenmesi Gerekenler ✓

| Ayar | Açıklama |
|---|---|
| **Add language and direction attributes** | `<html>` etiketinin `lang` ve `dir` attribute'larını garantiler. Tema da bunu sağlıyor, çift güvence iyidir. |
| **Add ARIA landmark roles** | Body class üzerinden landmark belirtir. Tema seviyesinde `role="banner"`, `role="contentinfo"` zaten var; bu yedektir. |
| **Add title attribute to social media icons** | İkon-only sosyal linklere yedek `title`. Bizim `aria-label` birincildir, çakışma olmaz. |
| **Remove tabindex from focusable elements** | Hatalı `tabindex="X"` kullanımlarını temizler. |
| **Force outline on focus** | Klavye odak göstergesini garanti eder. Tema'nın `accessibility.css` dosyasındaki `:focus-visible` stilleri birincildir. |
| **Remove the redundant title attribute from images** | `<img>` tag'lerinde otomatik `title` eklenmesini engeller (alt text yeterlidir). |

### 2.2 İşaretlenmemesi Gerekenler ✗

| Ayar | Neden Kapalı |
|---|---|
| **Add skip links** | Tema `header.php`'de zaten kendi skip-link'imizi ekliyor. Çift skip-link kullanıcıyı karıştırır. |
| **Default page font size** | Tema kendi tipografisini yönetiyor. Plugin'in zorla font-size atması görseli bozar. |
| **Hide images in iframes** | Yan etkisi öngörülemez. |
| **Auto-update WP Accessibility** | Müşteri talebi: pluginler güncellenmeyecek. |

### 2.3 Toolbar (Erişilebilirlik Araç Çubuğu)

Plugin'in opsiyonel toolbar'ı (kontrast değiştirici, font büyütücü) **şu
an için devre dışı bırakılsın**. Gerekçeler:

- Modern tarayıcılar zaten font büyütme (Ctrl/Cmd + `+`) ve forced colors
  modu destekliyor.
- Toolbar görsel olarak siteye dahil oluyor, kurumsal görünüm değişebilir.
- Etkinleştirilecekse: **Add WP Accessibility Toolbar** ✓, ardından
  "Visibility" altında footer'a yerleştirin. Müşteri onayı alınmadan
  açılmasın.

---

## 3. Cache Yönetimi

Plugin etkinleştirildikten sonra bu sırayla cache temizliği yapın:

1. **Autoptimize → Cache Statistics → Delete Cache**
2. **WP Super Cache → Settings → Easy → Delete Cache → Delete Cache**
3. Anonim/incognito tarayıcı penceresinde anasayfayı, bir haber detayı
   ve İletişim sayfasını yükleyerek görsel kontrol yapın.

---

## 4. Doğrulama Kontrol Listesi

Etkinleştirme sonrası şu testleri yapın:

- [ ] Anasayfa görsel olarak değişmedi (önceki ekran görüntüsü ile karşılaştır).
- [ ] `<html lang="tr-TR">` veya `lang="en-US"` etiketi çıkıyor.
- [ ] Tab tuşu ile sayfayı dolaştığında focus indicator görünüyor.
- [ ] Sosyal medya ikonları screen reader tarafından okunuyor (NVDA/VoiceOver).
- [ ] Skip-link sadece bir tane var ("Ana içeriğe geç" — tema'nın eklediği).
- [ ] Lighthouse Accessibility skoru ≥ 95 (Chrome DevTools).
- [ ] axe DevTools paneli 0 critical/serious hata gösteriyor.

---

## 5. Olası Çakışmalar

- **Polylang ile lang attribute**: WP Accessibility'nin "Add language and
  direction attributes" özelliği etkinse Polylang da kendi attribute'unu
  ekliyor olabilir. Tarayıcıda `<html lang="...">` etiketinin tek bir
  değer içerdiğini doğrulayın. Birden fazla çıkıyorsa ya plugin'in dil
  ayarını ya Polylang'i tercih edin (Polylang öncelikli).
- **Elementor**: WP Accessibility'nin auto-fix'leri Elementor widget
  HTML'sini etkilemez. Elementor içindeki erişilebilirlik (örn. heading
  widget'ında yanlış level seçimi) elle düzeltilmelidir.

---

## 6. Plugin Kaldırma (Acil Durum)

Plugin görsel/işlevsel sorun çıkarırsa:

1. **Admin → Eklentiler → WP Accessibility → Pasifleştir**.
2. Cache'leri temizleyin (Autoptimize + WP Super Cache).
3. Tema kodundaki erişilebilirlik düzeltmeleri (header, footer,
   accessibility.css, accessibility.js) tek başlarına da çalışır;
   plugin yalnızca yedek katmandır.

---

**Doküman versiyon:** 1.0
**Tarih:** 2026-05-11
**Hedef WP:** 5.0 (güncellenmeyecek)
**Hedef Plugin:** WP Accessibility 1.7+ (WordPress 5.0 uyumlu en güncel sürüm)
