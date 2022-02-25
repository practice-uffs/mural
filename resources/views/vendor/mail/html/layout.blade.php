<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>
</head>
<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
{{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>
</table>
</td>
</tr>

<!-- Waves at the bottom -->
<tr>
<td class="body no-paddding" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell no-padding">
<img src="{{ asset('img/mail/ondas.png') }}" title="Ondas coloridas do programa" />
</td>
</tr>
<tr>
<td class="content-cell no-padding default-bg centered pb-2">
    <a href="https://www.instagram.com/practice-uffs/"><img src="{{ asset('img/mail/instagram.png') }}" class="social" title="Instagram" /></a>
    <a href="https://www.youtube.com/channel/UCu3jAl8MTMPkaxb3u0_xESw" ><img src="{{ asset('img/mail/youtube.png') }}" class="social" title="Youtube" /></a>
    <a href="https://github.com/practiceuffs" ><img src="{{ asset('img/mail/github.png') }}" class="social" title="Github" /></a>
    <a href="https://twitter.com/PracticeUFFS" ><img src="{{ asset('img/mail/twitter.png') }}" class="social" title="Twitter" /></a>
    <a href="https://www.facebook.com/Practice-UFFS-104348284683285" ><img src="{{ asset('img/mail/facebook.png') }}" class="social" title="Facebook" /></a>
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>
