# Export logos to PNG using ImageMagick or Inkscape
# Usage: .\scripts\export-logos.ps1

$scriptDir = Split-Path -Parent $MyInvocation.MyCommand.Path
$svgDir = Join-Path $PSScriptRoot "..\public\images" | Resolve-Path -Relative
$svgDir = Join-Path (Get-Location) $svgDir
$variants = @("logo-adventure", "logo-adventure-dark", "logo-adventure-mono")
$sizes = @(2000, 1024, 256)

function Has-Command($name) {
    try { Get-Command $name -ErrorAction Stop | Out-Null; return $true } catch { return $false }
}

if (Has-Command 'magick') {
    Write-Host "Using ImageMagick (magick) to export PNGs..." -ForegroundColor Green
    foreach ($v in $variants) {
        $svg = Join-Path $svgDir "$v.svg"
        foreach ($s in $sizes) {
            $out = Join-Path $svgDir "$v-$s.png"
            Write-Host "Exporting $svg => $out ($s px)"
            magick -background none $svg -resize $s $out
        }
    }
    Write-Host "Export complete." -ForegroundColor Green
    exit 0
}

if (Has-Command 'inkscape') {
    Write-Host "Using Inkscape to export PNGs..." -ForegroundColor Green
    foreach ($v in $variants) {
        $svg = Join-Path $svgDir "$v.svg"
        foreach ($s in $sizes) {
            $out = Join-Path $svgDir "$v-$s.png"
            Write-Host "Exporting $svg => $out ($s px)"
            inkscape $svg --export-type=png --export-filename=$out --export-width=$s
        }
    }
    Write-Host "Export complete." -ForegroundColor Green
    exit 0
}

Write-Host "Neither ImageMagick (magick) nor Inkscape (inkscape) was found in PATH. Install one of them and re-run this script." -ForegroundColor Yellow
exit 1
