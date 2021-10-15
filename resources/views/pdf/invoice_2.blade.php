<!doctype html>
<html lang="ru" style="margin: 0; padding: 0;">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="telephone=no" name="format-detection">
  <title>{{ config('app.name') . ' - Invoice для пользователя ' . $invoice->user_name . '.pdf' }}</title>
  <style>
      @font-face {
          font-family: "DejaVu Sans";
          font-style: normal;
          font-weight: 400;
          src: url("/fonts/DejaVuSans.ttf");
          /* IE9 Compat Modes */
          src: local("DejaVu Sans"),
          local("DejaVu Sans"),
          url("/fonts/DejaVuSans.ttf") format("truetype");
      }

      .p_m-0 p {
          margin: 0;
      }

      .top tr, .top td {
          vertical-align: top;
      }

      body {
          font-family: "DejaVu Sans", serif;
      }
  </style>
  <style>
      .page-break {
          page-break-after: always;
      }
  </style>
</head>
<body>
<table style="padding: 25px; width: 800px">
  <tr>
    <td colspan="2">
      <table style="width: 100%; padding-right: 25px">
        <tr>
          {{--          TODO: Реквезиты--}}
          <td style="width: 60%; font-size: 12px">
            <p style="margin: 0;">A: Nurlytau Business Center /ALMATY KAZAKHSTAN</p>
            <p style="margin: 0;">E: emaiil@google.com W: {{ url('/') }}</p>
            <p style="margin: 0;">M: +7 999 999 99 99 T: +7 999 999 99 99</p>
          </td>
          <td style="width: 40%">
            <img src="{{ asset('images/logo_pdf.png') }}" style="width: 100%; height: auto;" alt="logo">
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold; font-size: 14px">
      <table style="width: 70%" class="p_m-0 top">
        <tr>
          <td style="width: 30%">
            <p>Tour operator:</p>
          </td>
          <td style="width: 70%">
            <p>{{ $invoice->company->name }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <p>Reference:</p>
          </td>
          <td>
            <p>{{ $invoice->company->code }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <p>Client:</p>
          </td>
          <td>
            <p>{{ $invoice->user_name }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <p>Nationality:</p>
          </td>
          <td>
            <p>{{ $invoice->user_nationality }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <p>Booking number:</p>
          </td>
          <td>
            @foreach($invoice->bookings()->pluck('booking_number') as $number)
              <p>{{ $number }}{{ (count($invoice->bookings()->pluck('booking_number')) > 1 && !$loop->last) ? ',' : '' }}</p>
            @endforeach
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>