<?php
function hitungjamterlambat($jadwal_jam_masuk, $jam_presensi)
{
    $j1 = strtotime($jadwal_jam_masuk);
    $j2 = strtotime($jam_presensi);
    $diffterlambat = $j2 - $j1;

    $jamterlambat = floor($diffterlambat / (60 * 60));
    $menitterlambat = floor(($diffterlambat-($jamterlambat * (60 * 60)))/60);

    $jterlambat = $jamterlambat <= 9 ? "0".$jamterlambat : $jamterlambat;
    $mterlambat = $menitterlambat <= 9 ? "0".$menitterlambat : $menitterlambat;

    $terlambat = $jterlambat . ":".$mterlambat;
    return $terlambat;
}

function hitungjamterlambatdesimal($jam_masuk, $jam_presensi)
{
    $j1 = strtotime($jam_masuk);
    $j2 = strtotime($jam_presensi);
    $diffterlambat = $j2 - $j1;

    $jamterlambat = floor($diffterlambat / (60 * 60));
    $menitterlambat = floor(($diffterlambat-($jamterlambat * (60 * 60)))/60);

    $jterlambat = $jamterlambat <= 9 ? "0".$jamterlambat : $jamterlambat;
    $mterlambat = $menitterlambat <= 9 ? "0".$menitterlambat : $menitterlambat;

    $desimalterlambat = ROUND(($menitterlambat/60),2);
    return $desimalterlambat;
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
