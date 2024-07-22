@extends('emails.layouts.default')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0"
        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
        <tr>
            <td style="font-family: Inter, sans-serif; font-size: 14px; vertical-align: top;">
                <p
                    style="font-family: Inter, sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                    Lo sentimos, <strong>{{ $fullname }}</strong> </p>
                <p
                    style="font-family: Inter, sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                    Queremos informarte que la pieza gráfica que creaste para la vacante
                    "<strong>{{ $position }}</strong>" ha sido rechazada.</p>

                <p
                    style="font-family: Inter, sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                    Apreciamos tu esfuerzo y creatividad. Por favor, revisa los comentarios y sugerencias proporcionados
                    para mejorar la pieza gráfica.</p>

                @if ($reason)
                    <p
                        style="font-family: Inter, sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                        <strong>Observaciones: </strong> {{ $reason }}
                    </p>
                @endif

                <p
                    style="font-family: Inter, sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                    ¡Gracias por tu valioso aporte y dedicación!</p>

                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr>
                            <td align="left">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td> <a href="{{ $link }}" target="_blank">Ver vacante</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p
                    style="font-family: Inter, sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer">{{ $link }}</a>
                </p>
                <p
                    style="font-family: Inter, sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                    Saludos,<br>
                    <strong style="font-weight: bold; font-size: 12px;">We Power the Future, One Line of Code at a
                        Time.</strong>
                </p>
            </td>
        </tr>
    </table>
@endsection
