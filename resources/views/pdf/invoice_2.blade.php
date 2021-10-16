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

      .table-bordered tr, .table-bordered td {
          border: 1px solid #000000;
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
      <table style="width: 100%; padding-right: 25px" class="top">
        <tr>
          {{--          TODO: Реквезиты--}}
          <td style="width: 60%; font-size: 12px">
            <p style="margin: 0;">Hotline: +7 776 777 0507</p>
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
            <p>Booking No:</p>
          </td>
          <td>
            @foreach($invoice->bookings()->pluck('booking_number') as $number)
              <p>{{ $number }}{{ (count($invoice->bookings()->pluck('booking_number')) > 1 && !$loop->last) ? ',' : '' }}</p>
            @endforeach
          </td>
        </tr>
        <tr>
          <td>
            <p>Arrival: {{ $invoice->arrival_time->format('d.m.y') }}</p>
          </td>
          <td>
            <p>Departure: {{ $invoice->departure_time->format('d.m.y') }}</p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p style="padding-left: 26px; font-size: 16px; font-weight: bolder">Hotels</p>
<table style="width: 750px; margin: 0; padding-left: 25px; padding-right: 25px;" cellspacing="0" border="1"
       cellpadding="5">
  <tr style="font-weight: bold; font-size: 14px">
    <td align="center" style="">
      Supplier
    </td>
    <td align="center">
      Qty
    </td>
    <td align="center">
      Services
    </td>
    <td align="center">
      Check in
    </td>
    <td align="center">
      Check out
    </td>
    <td align="center">
      Night
    </td>
    <td align="center">
      M.P.
    </td>
    <td align="center">
      Adult
    </td>
    <td align="center">
      Child
    </td>
    <td align="center">
      CN
    </td>
  </tr>
  @foreach($invoice->bookings as $b)
    <tr>
      <td>{{ $b->hotel->name }}</td>
      <td align="center">{{ $b->count }}</td>
      <td>{{ $b->room->name }}</td>
      <td>{{ $b->check_in->format('d.m.Y') }}</td>
      <td>{{ $b->check_out->format('d.m.Y') }}</td>
      <td align="center">{{ $b->check_in->diffInDays($b->check_out) }}</td>
      <td>{{ $b->bb }}</td>
      <td align="center">{{ $b->adults }}</td>
      <td align="center">{{ $b->children }}</td>
      <td style="font-size: 11px">{{ $b->booking_number }}</td>
    </tr>
  @endforeach
</table>

<p style="padding-left: 26px; font-size: 16px; font-weight: bolder">Transfer</p>
<table style="width: 800px; padding: 0 25px 25px;" cellspacing="0" border="1" cellpadding="5">
  <tr style="font-weight: bold; font-size: 14px;">
    <td align="center" colspan="2" style="">
      Date
    </td>
    <td align="center">
      Time
    </td>
    <td align="center">
      Flight code
    </td>
    <td align="center">
      Qty
    </td>
    <td align="center">
      From
    </td>
    <td align="center">
      To
    </td>
    <td align="center">
      Pax
    </td>
    <td align="center">
      Type
    </td>
    <td align="center">
      Guide
    </td>
  </tr>
  <tr>
    <td>
      A
      <br>
      R
      <br>
      V
    </td>
    <td>{{ $invoice->arrival_time->format('d.m.y') }}</td>
    <td>{{ $invoice->arrival_time->format('H:s') }}</td>
    <td>{{ $invoice->arrival_flight_code }}</td>
    <td align="center">{{ $invoice->passengers }}</td>
    <td>{{ $invoice->arrival_airport->name }}</td>
    <td>{{ $invoice->departure_airport->name }}</td>
    <td align="center">2</td>
    <td>{{ $invoice->transport->name }}</td>
    <td>{{ $invoice->gid ? "Yes" : "No" }}</td>
  </tr>
  <tr>
    <td>
      D
      <br>
      E
      <br>
      P
    </td>
    <td>{{ $invoice->departure_time->format('d.m.y') }}</td>
    <td>{{ $invoice->departure_time->format('H:s') }}</td>
    <td>{{ $invoice->departure_flight_code }}</td>
    <td align="center">{{ $invoice->passengers }}</td>
    <td>{{ $invoice->departure_airport->name }}</td>
    <td>{{ $invoice->arrival_airport->name }}</td>
    <td align="center">2</td>
    <td>{{ $invoice->transport->name }}</td>
    <td>{{ $invoice->gid ? "Yes" : "No" }}</td>
  </tr>
</table>

<div class="page-break"></div>

<p
  style="padding-left: 26px; font-size: 16px; font-weight: bolder; margin-bottom: 0;padding-bottom: 0; margin-top: 30px;">
  Excursion
</p>
<table style="width: 800px;padding-left: 25px; padding-right: 25px; margin-top: 0; padding-top: 0;">
  @php
    $counter = 1;
      $invoice->days()->chunkById(20, function ($days) use ($invoice, &$counter) {
      echo '<tr style="padding: 0; margin: 0">';
        echo '<td colspan="2" style="width: 100%; vertical-align: top;">';
          echo '<table style="margin: 0; padding: 0; margin-top: 30px; width: 100%; border: 2px solid #eee" cellpadding="5">';
            echo '<tr>';
              echo '<th style="width: 80%">Supplier</th>';
              echo '<th style="width: 20%; border-left: 2px solid #eee">From</th>';
            echo '</tr>';
            foreach ($days as $index => $day) {
              echo '<tr>';
                echo '<td style="border-top: 2px solid #eee; width: 80% "><strong>' .  ($day->free ? '"Free day"' : $day->resort->name)  . '</strong></td>';
                echo '<td align="center" style="border-left: 2px solid #eee; border-top: 2px solid #eee; width: 20%">' . $invoice->arrival_time->addDays($counter)->format('d.m.y') . '</td>';
              echo '</tr>';
              $counter++;
            }
            echo '</table>';
          echo '</td>';
        echo '</tr>';
        })
  @endphp
</table>
</body>
</html>