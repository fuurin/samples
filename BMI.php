<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Body Mass Index</title>
<link rel="stylesheet" href="HTMLの復習.css" type="text/css">
</head>
<body>
	<h1>Body Mass Index</h1>

<form action="check6.php" method="post">
	体重:<input type="text" name="weight" value=<?php echo $_POST["weight"] ?> />kg
	<?php if( ( $_POST["weight"] >= 1.0 && $_POST["weight"] <= 200.0 ) == FALSE )
		{
			echo "<font color = 'red'> ← 1 ～ 200の数字(半角)を入力してください。</font>";
		}
	?>
	<br/><br/>

	身長:<input type="text" name="height"  value=<?php echo $_POST["height"] ?> />cm
	<?php if( ( $_POST["height"] >= 1.0 && $_POST["height"] <= 200.0 ) == FALSE )
		{
			echo "<font color = 'red'> ← 1 ～ 200の数字(半角)を入力してください。</font>";
		}
	?>
	<br/><br/>

	<input type="submit" value="計算する" />
	<br/><br/>
</form>

	BMI:
	<?php
		if( ($_POST["weight"] >= 1.0 && $_POST["weight"] <= 200.0 && $_POST["height"] >= 1.0 && $_POST["height"] <= 200.0) == FALSE )
		{
			echo "<font color = 'red'>ERROR</font>";
		}
		else if(isset($_POST["weight"], $_POST["height"]) == true)
		{
			$BMI = 10000 * $_POST["weight"] / ($_POST["height"] * $_POST["height"]);
			printf(" %.1f", $BMI);
		}
	?>
	<br/><br/>

	判定:
	<?php
		if( ($_POST["weight"] >= 1.0 && $_POST["weight"] <= 200.0 && $_POST["height"] >= 1.0 && $_POST["height"] <= 200.0) ==FALSE )
		{
			echo "<font color = 'red'>ERROR</font>";
		}
		else if(isset($_POST["weight"], $_POST["height"]) == true)
		{
			$BMI = 10000 * $_POST["weight"] / ($_POST["height"] * $_POST["height"]);
			
			if( $BMI < 18.5 )echo "低体重";
			elseif( $BMI < 25 )echo "標準";
			elseif( $BMI < 30 )echo "肥満(1度)";
			elseif( $BMI < 35 )echo "肥満(2度)";
			elseif( $BMI < 40 )echo "肥満(3度)";
			elseif( $BMI >= 40 )echo "肥満(4度)";
		}
	?>
	<br/><br/>

	<h3>参考</h3>

	BMI = 体重[kg]/(身長[m]^2)</br></br>

	日本肥満学会の肥満基準(2000年)</br>

<table>
	<tr><th>状態</th><th>指標</th></tr>
	<tr><td>標準体重</td><td>18.5以上、25未満</td></tr>
	<tr><td>肥満(1度)</td><td>25以上、30未満</td></tr>
	<tr><td>肥満(2度)</td><td>30以上、35未満</td></tr>
	<tr><td>肥満(3度)</td><td>35以上、40未満</td></tr>
	<tr><td>肥満(4度)</td><td>40以上</td></tr>
</table>

</body>
</html>
