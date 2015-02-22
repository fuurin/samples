<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>サンプル</title>
</head>
<body>

<h2>瞬間運勢(漢字時計版)</h2>

<p>リロードするたびにその瞬間の運勢が占えます。</p>

<h1>
<?php
	function kanji( $time )
	{
		$t	=	(int)$time;
		$fig 	=	(int)log10( $t );
		$string	=	"";

		if($t==0)return "零";

		for($i=0;$i<=$fig;$i++)
		{
			if( $i==1 )$string .= "十";
			
			//文字列切り取り関数、$tの$i文字目から1文字切り取る
			switch( substr($t, $i, 1) )
			{
				//一が付くのは最後の桁のときだけ
				case 1:	if($i==$fig)$string .= "一";	break;
				case 2:	$string .= "二";		break;
				case 3:	$string .= "三";		break;
				case 4:	$string .= "四";		break;
				case 5:	$string .= "五";		break;
				case 6:	$string .= "六";		break;
				case 7:	$string .= "七";		break;
				case 8:	$string .= "八";		break;
				case 9:	$string .= "九";		break;
				default:				break;
			}
		}
		
		return $string;
	}

	date_default_timezone_set("Asia/Tokyo");

	if( date("a") == "am" )	echo "午前";
	else 			echo "午後";

	$g = kanji( date("g") );
	$i = kanji( date("i") );
	$s = kanji( date("s") );

	echo "{$g}時{$i}分{$s}秒";
?>

<br/>
現在の運勢は<?php

	$fortune = array( "大吉", "中吉", "小吉", "吉", "末吉", "凶", "大凶" );

	$count = count( $fortune );

	//乱数発生関数。rand(最小値,最大値) 重い？
	$random = rand( 0, $count-1 );

	echo $fortune[ $random ];
?>です。
</h1>

</body>
</html>
