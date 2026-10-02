#!/usr/bin/env bash
# Export logos to PNG using ImageMagick or Inkscape
# Usage: ./scripts/export-logos.sh

set -euo pipefail
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
SVG_DIR="$SCRIPT_DIR/../public/images"
VARIANTS=("logo-adventure" "logo-adventure-dark" "logo-adventure-mono")
SIZES=(2000 1024 256)

if command -v magick >/dev/null 2>&1; then
  echo "Using ImageMagick (magick) to export PNGs..."
  for v in "${VARIANTS[@]}"; do
    svg="$SVG_DIR/$v.svg"
    for s in "${SIZES[@]}"; do
      out="$SVG_DIR/$v-$s.png"
      echo "Exporting $svg => $out ($s px)"
      magick -background none "$svg" -resize "$s" "$out"
    done
  done
  echo "Export complete."
  exit 0
fi

if command -v inkscape >/dev/null 2>&1; then
  echo "Using Inkscape to export PNGs..."
  for v in "${VARIANTS[@]}"; do
    svg="$SVG_DIR/$v.svg"
    for s in "${SIZES[@]}"; do
      out="$SVG_DIR/$v-$s.png"
      echo "Exporting $svg => $out ($s px)"
      inkscape "$svg" --export-type=png --export-filename="$out" --export-width="$s"
    done
  done
  echo "Export complete."
  exit 0
fi

echo "Neither ImageMagick (magick) nor Inkscape (inkscape) found in PATH. Install one and re-run this script." >&2
exit 1
