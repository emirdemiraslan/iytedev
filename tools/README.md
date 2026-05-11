# tools/

One-off scripts that are *not* loaded by the theme runtime. Run them
manually when needed.

## alt-text-audit.php

Scans posts/pages/CPTs and the media library for missing alt text,
produces two CSV reports for the content team to action.

**Run with WP-CLI (recommended):**

```bash
wp eval-file wp-content/themes/iyte_dev/tools/alt-text-audit.php
```

**Run via browser (admin only, temporary):**

1. Browse to
   `https://iyte.edu.tr/wp-content/themes/iyte_dev/tools/alt-text-audit.php?run=1`
   while logged in as administrator.
2. **Important:** delete or rename the file when finished — do not
   leave a publicly accessible PHP script in the theme.

Output: `tools/reports/alt-text-audit-YYYY-MM-DD-HHMMSS.csv` plus a
separate file with `-attachments.csv` suffix for unused / orphaned
images.
