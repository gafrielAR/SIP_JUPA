<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PEJU PA</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding: 5px;
        }

        code {
            -ms-high-contrast-adjust: 0.125;
            border-radius: 0.125rem;
            background-color: #252A37;
            color: #eb4432;
            padding: 0 0.125rem;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th><code>NRP</code></th>
                <th>Name</th>
                <th>First Mentor</th>
                <th>Second Mentor</th>
                <th>Title</th>
                <th>Lab</th>
                <th>Proposal Date</th>
                <th>Proposal Revision Date</th>
                <th>Final Project Date</th>
                <th>Final Project Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($datas as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->student->nrp }}</td>
                    <td>{{ $item->student->name }}</td>
                    <td>{{ $item->stMentor->name }}</td>
                    <td>{{ $item->ndMentor->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->lab->name }}</td>
                    <td>{{ $item->proposal_date }}</td>
                    <td>{{ $item->proposal_revision_date }}</td>
                    <td>{{ $item->final_project_date }}</td>
                    <td>{{ $item->final_project_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
