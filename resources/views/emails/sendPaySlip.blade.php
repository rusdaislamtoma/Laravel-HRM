@component('mail::message')
Dear {{ $data['employee']->name }}

Here goes your payslip for the month of {{ date('M') }}
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<table>
    <tr>
        <th>Basic</th>
        <td style="text-align: right">{{ $data['employee']->relPayRoll->basic }} </td>
    </tr>
    <tr>
        <th>House Rent</th>
        <td style="text-align: right">{{ $data['employee']->relPayRoll->house_rent }} </td>
    </tr>
    <tr>
        <th>Medical</th>
        <td style="text-align: right">{{ $data['employee']->relPayRoll->medical }} </td>
    </tr>
    <tr>
        <th>Travel Allowance</th>
        <td style="text-align: right">{{ $data['employee']->relPayRoll->travel_allowance }} </td>
    </tr>
    <tr>
        <th>Daily Allowance</th>
        <td style="text-align: right">{{ $data['employee']->relPayRoll->daily_allowance }} </td>
    </tr>
    <tr>
        <th>Provident Fund</th>
        <td style="text-align: right">{{ $data['employee']->relPayRoll->provident_fund }} </td>
    </tr>
    <tr>
        <th>Gross</th>
        <td style="text-align: right">{{ $data['employee']->relPayRoll->gross }} </td>
    </tr>
</table>
Thanks,<br>
{{ config('app.name') }}



@endcomponent
