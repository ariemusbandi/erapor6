<table class="table" border="1">
	<tr>
		<td>Sekolah</td>
		<td>{{$rombongan_belajar->sekolah->nama}}</td>
	</tr>
	<tr>
		<td>NPSN</td>
		<td>{{$rombongan_belajar->sekolah->npsn}}</td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>{{$rombongan_belajar->nama}}</td>
	</tr>
	<tr>
		<td>Tahun Pelajaran</td>
		<td>{{session('semester_id')}}</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<table class="table" border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>NAMA PESERTA DIDIK</th>
			<th>NISN</th>
			@foreach($all_pembelajaran as $pembelajaran)
			<th>{{$pembelajaran->nama_mata_pelajaran}}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
	@foreach($data_siswa as $siswa)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$siswa->nama}}</td>
			<td>{{$siswa->nisn}}</td>
			@foreach($all_pembelajaran as $pembelajaran)
			<?php
			$nilai = $pembelajaran->nilai_akhir_kurmer()->where('anggota_rombel_id', $siswa->anggota_rombel->anggota_rombel_id)->first();
			?>
			<td>{{($nilai) ? $nilai->nilai : '-'}}</td>
			@endforeach
		</tr>
	@endforeach
	</tbody>
</table>