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
  <thead>
  <tr>
    <td style="font-weight: bold; padding: 25px; font-size: 24px">{{ config('app.name') }}</td>
  </tr>
  </thead>
  <tbody>
  {{--  User info --}}
  <tr>
    <td style="padding-top: 30px;">
      <span style="font-weight: bold; font-size: 18px">Информация о клиенте</span>
    </td>
  </tr>
  <tr style="padding: 0; margin: 0">
    <td style="padding-left: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; padding-bottom: 0;"><strong>Имя:</strong> {{ $invoice->user_name }}</p>
    </td>
    <td style="padding-right: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; padding-bottom: 0;"><strong>Компания:</strong> {{ $invoice->company->name }}</p>
    </td>
  </tr>
  <tr>
    <td style="padding-left: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; margin-top: 0;"><strong>Национальность:</strong> {{ $invoice->user_nationality }}</p>
    </td>
    <td style="padding-right: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; margin-top: 0;"><strong>Reference:</strong> {{ $invoice->company->code }}</p>
    </td>
  </tr>
  {{-- End User info --}}

  {{--  Hotels --}}
  <tr style="padding-bottom: 0;">
    <td style="padding-top: 30px; padding-bottom: 0;">
      <span
        style="font-weight: bold; font-size: 18px">{{ $invoice->bookings()->count() > 1 ? 'Информация об отелях' : 'Информация об отеле' }}</span>
    </td>
  </tr>
  {{--  Hotel some --}}
  @foreach($invoice->bookings as $booking)
    <tr>
      <td style="width: 100%; padding-bottom: 20px" colspan="2">
        <table style="width: 100%; margin: 0; padding: 0; padding-top: 10px;">
          <tr style="">
            <td style="padding-left: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Отель:</strong> {{ $booking->hotel->name }}</p>
            </td>
            <td style="padding-right: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Чек ин:</strong> {{ $booking->check_in->format('d.m.y') }}</p>
            </td>
          </tr>
          <tr style="">
            <td style=" padding-left: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Комната:</strong> {{ $booking->room->name }}</p>
            </td>
            <td style="padding-right: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Чек аут:</strong> {{ $booking->check_out->format('d.m.y') }}</p>
            </td>
          </tr>

          <tr style="">
            <td style=" padding-left: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Кол-во:</strong> {{ $booking->count }}</p>
            </td>
            <td style="padding-right: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Номер брони:</strong> {{ $booking->booking_number }}</p>
            </td>
          </tr>

          <tr style="">
            <td style=" padding-left: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Взрослые:</strong> {{ $booking->adults }}</p>
            </td>
            <td style="padding-right: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Meal Plan:</strong> {{ $booking->bb }}</p>
            </td>
          </tr>
          <tr style="">
            <td colspan="2"
                style=" padding-left: 30px; width: 50%; vertical-align: top; padding-top: 0; padding-bottom: 0">
              <p style="margin: 0; padding: 0"><strong>Дети:</strong> {{ $booking->children }}</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  @endforeach
  {{--  Hotel some --}}
  {{-- End Hotels --}}

  {{--  User info --}}
  <tr>
    <td style="">
      <span style="font-weight: bold; font-size: 18px">Трансфер</span>
    </td>
  </tr>
  <tr style="padding: 0; margin: 0">
    <td style="padding-left: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; padding-bottom: 0;"><strong>Время
          прилёта:</strong> {{ $invoice->arrival_time->format('d.m.y H:s') }}</p>
    </td>
    <td style="padding-right: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; padding-bottom: 0;"><strong>Время
          улёта:</strong> {{ $invoice->departure_time->format('d.m.y H:s') }}</p>
    </td>
  </tr>

  <tr>
    <td style="padding-left: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; margin-top: 0;"><strong>Куда:</strong> {{ $invoice->arrival_airport->name }}</p>
    </td>
    <td style="padding-right: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; margin-top: 0;"><strong>Откуда:</strong> {{ $invoice->departure_airport->name }}</p>
    </td>
  </tr>

  <tr>
    <td style="padding-left: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; margin-top: 0;"><strong>Код рейса:</strong> {{ $invoice->arrival_flight_code }}</p>
    </td>
    <td style="padding-right: 30px; width: 50%; vertical-align: top;">
      <p style="margin-bottom: 0; margin-top: 0;"><strong>Код рейса:</strong> {{ $invoice->departure_flight_code }}</p>
    </td>
  </tr>
  {{-- End User info --}}

  {{--  Sample --}}

  <tr>
    <td style="padding-top: 30px;">
      @if ($invoice->days()->count() > 5)
        <div class="page-break"></div>
      @endif
      <span style="font-weight: bold; font-size: 18px">Расписание</span>
    </td>
  </tr>
  @php
    $counter = 1;
      $invoice->days()->chunkById(20, function ($days) use ($invoice, &$counter) {
      echo '<tr style="padding: 0; margin: 0">';
        echo '<td colspan="2" style="padding-left: 30px; padding-right: 30px; width: 100%; vertical-align: top;">';
          echo '<table style="margin: 0; padding: 0; margin-top: 30px; width: 100%; border: 2px solid #eee" cellpadding="5">';
            echo '<tr>';
              echo '<th style="width: 80%">Курорт</th>';
              echo '<th style="width: 20%; border-left: 2px solid #eee">Дата</th>';
            echo '</tr>';
            foreach ($days as $index => $day) {
              echo '<tr>';
                echo '<td style="border-top: 2px solid #eee; width: 80% "><strong>' .  ($day->free ? 'Free day' : $day->resort->name)  . '</strong></td>';
                echo '<td align="center" style="border-left: 2px solid #eee; border-top: 2px solid #eee; width: 20%">' . $invoice->arrival_time->addDays($counter)->format('d.m.y') . '</td>';
              echo '</tr>';
              $counter++;
            }
            echo '</table>';
          echo '</td>';
        echo '</tr>';
        })
  @endphp
  {{-- End Sample --}}
  </tbody>
</table>
</body>
</html>