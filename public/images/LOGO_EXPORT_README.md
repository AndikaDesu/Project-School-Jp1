Logo files location
-------------------
All logo SVGs are in `public/images/`:

- `logo-adventure.svg` (primary)
- `logo-adventure-dark.svg` (dark variant)
- `logo-adventure-mono.svg` (mono / single-color)

Recommended output filenames (PNG):
- logo-adventure-2000.png
- logo-adventure-1024.png
- logo-adventure-256.png

Export commands
---------------
Below are copy/paste-ready commands for PowerShell (Windows) and bash (Linux/macOS). Use ImageMagick (`magick`) if available, otherwise use Inkscape.

ImageMagick (PowerShell):

```powershell
magick -background none public\images\logo-adventure.svg -resize 2000 public\images\logo-adventure-2000.png
magick -background none public\images\logo-adventure.svg -resize 1024 public\images\logo-adventure-1024.png
magick -background none public\images\logo-adventure.svg -resize 256 public\images\logo-adventure-256.png

magick -background none public\images\logo-adventure-dark.svg -resize 2000 public\images\logo-adventure-dark-2000.png
magick -background none public\images\logo-adventure-dark.svg -resize 1024 public\images\logo-adventure-dark-1024.png
magick -background none public\images\logo-adventure-dark.svg -resize 256 public\images\logo-adventure-dark-256.png

magick -background none public\images\logo-adventure-mono.svg -resize 2000 public\images\logo-adventure-mono-2000.png
magick -background none public\images\logo-adventure-mono.svg -resize 1024 public\images\logo-adventure-mono-1024.png
magick -background none public\images\logo-adventure-mono.svg -resize 256 public\images\logo-adventure-mono-256.png
```

ImageMagick (bash):

```bash
magick -background none public/images/logo-adventure.svg -resize 2000 public/images/logo-adventure-2000.png
magick -background none public/images/logo-adventure.svg -resize 1024 public/images/logo-adventure-1024.png
magick -background none public/images/logo-adventure.svg -resize 256 public/images/logo-adventure-256.png
# repeat for -dark.svg and -mono.svg
```

Inkscape (modern CLI) — PowerShell:

```powershell
inkscape public\images\logo-adventure.svg --export-type=png --export-filename=public\images\logo-adventure-2000.png --export-width=2000
inkscape public\images\logo-adventure.svg --export-type=png --export-filename=public\images\logo-adventure-1024.png --export-width=1024
inkscape public\images\logo-adventure.svg --export-type=png --export-filename=public\images\logo-adventure-256.png --export-width=256
```

Inkscape (bash):

```bash
inkscape public/images/logo-adventure.svg --export-type=png --export-filename=public/images/logo-adventure-2000.png --export-width=2000
# repeat for other sizes and variants
```

Notes & tips
-----------
- Use `-background none` to preserve transparency when using ImageMagick.
- For highest quality, export at a large size (2000–4000 px) and downscale as needed.
- If ImageMagick/Inkspace are not available locally, you can use online tools (e.g., CloudConvert, SVGtoPNG) but prefer local tools for fidelity and privacy.
- To use the logo in the Blade views, reference via `asset('images/logo-adventure.png')` after you export.

If you want, I can:
- run exports here if you install ImageMagick or Inkscape and allow me to run commands, or
- create and add exported PNGs to `public/images` now if you provide permission to run local commands (or confirm these tools are available).
 
Automation scripts
------------------
I've added two helper scripts to automate exporting the SVGs to PNGs for common sizes:

- PowerShell: `scripts/export-logos.ps1`
- Bash: `scripts/export-logos.sh`

Usage (PowerShell):
```powershell
cd c:\laragon\www\wisata-semarang
.\scripts\export-logos.ps1
```

Usage (bash):
```bash
cd /path/to/wisata-semarang
./scripts/export-logos.sh
```

The scripts will prefer ImageMagick (`magick`) and fall back to Inkscape (`inkscape`). They export three sizes: 2000, 1024, 256 px. If neither tool is available, the script will print instructions.
