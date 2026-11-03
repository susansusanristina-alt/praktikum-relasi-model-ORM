<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Akademik</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 30px;
        }

        h1 {
            color: #4b2995;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #4b2995;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Portal Akademik Mahasiswa</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Profil</th>
                <th>Mata Kuliah</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->studyProgram->name }}</td>
                    <td>
                        @if ($student->profile)
                            {{ $student->profile->phone }}
                        @else
                            Belum ada profil
                        @endif
                    </td>
                    <td>
                        @forelse ($student->courses as $course)
                            {{ $course->name }}<br>
                        @empty
                            Belum mengambil mata kuliah
                        @endforelse
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>