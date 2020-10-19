<?php
//ob_start();


$number = rand (12345, 99999);
session_start();
$_SESSION['number'] = $number;

$img_x          = 200;   //������ �����������, �� ���������-100
$img_y          = 60;   //������ �����������, �� ���������-30
$num_n          = 5;    //����� ����, default-4
$font_min_size  = 20;   //����������� ������ ������, �� ���������-12
$lines_n_max    = 10;    //������������ ����� ������� �����, �� ���������-2
$nois_percent   = 10;    //������������� ������� ���� � ������, � ���������, �� ���������-3
$angle_max      = 15;   //������������ ���� ���������� �� ����������� �� ������� ������� � ������, �� ���������-20

$font_arr=glob("fonts/bodoni.ttf");

$im=imagecreate($img_x, $img_y);
//������� ����������� �����
$text_color = imagecolorallocate($im, rand(0, 50), rand(0, 50), rand(0, 50));       //���� ������
$nois_color = imagecolorallocate($im, rand(50, 128), rand(50, 128), rand(50, 128));       //���� ����������� ����� � �����
//$img_color  = imagecolorallocate($im, rand(129, 255), rand(129, 255), rand(129, 255)); //���� ����
$img_color  = imagecolorallocate($im, 255, 255, 255); //���� ����
//�������� ����������� ������� ������
imagefill($im, 0, 0, $img_color);
//� ���������� $number ����� ��������� �����, ���������� �� �����������



for ($n=0; $n<strlen($number); $n++){
    $num = substr($number, $n,1);
    $font_size=rand($font_min_size, $img_y/2);
    $angle=rand(360-$angle_max,360+$angle_max);

    $font_cur=rand(0,count($font_arr)-1);
    $font_cur=$font_arr[$font_cur];
    //���������� ��������� ��� ������ �����, ������� ������������ ���������� �����������
    //��� ����� ��������� �������� ����� � �����������
    $y=rand(($img_y-$font_size)/4+$font_size, ($img_y-$font_size)/2+$font_size);

    $x=rand(($img_x/$num_n-$font_size)/2, $img_x/$num_n-$font_size)+$n*$img_x/$num_n;

    imagettftext($im, $font_size, $angle, $x, $y, $text_color, $font_cur, $num);
};
//��������� ����� "�����������" ��������
$nois_n_pix=round($img_x*$img_y*$nois_percent/100);
//��������� ����������� ��������� ����� ������
for ($n=0; $n<$nois_n_pix; $n++){
    $x=rand(0, $img_x);
    $y=rand(0, $img_y);
    imagesetpixel($im, $x, $y, $nois_color);
}
//��������� ����������� ��������� �������� �����
for ($n=0; $n<$nois_n_pix; $n++){
    $x=rand(0, $img_x);
    $y=rand(0, $img_y);
    imagesetpixel($im, $x, $y, $img_color);
}
$lines_n=rand(0,$lines_n_max);
//�������� "�����������" ����� ����� ������
for ($n=0; $n<$lines_n; $n++){
    $x1=rand(0, $img_x);
    $y1=rand(0, $img_y);
    $x2=rand(0, $img_x);
    $y2=rand(0, $img_y);
    imageline($im, $x1, $y1, $x2, $y2, $nois_color);
}

//$_SESSION['number'] = $number;

Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
Header("Last-Modified: ".gmdate("D, d M Y H:i:s")."GMT");
Header("Cache-Control: no-cache, must-revalidate");
Header("Pragma: no-cache");
header("Content-type: image/png");
imageInterlace($im, 1);
imagepng($im);
imagedestroy($im);

//$_SESSION['number'] = $number;
//session_register('number');

// � ���������� $number �������� �����, ���������� �� �����������
//ob_flush();
?>

