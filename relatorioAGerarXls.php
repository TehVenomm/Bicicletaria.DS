<?php
$htmlstring = $_POST['stringhtml'];
header('Content-type: application/vnd.ms-excel');
$filename = 'clientes.xls ';
header('Content-Disposition: attachment; filename='.$filename);

$data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
<head>
	<!--[if gte mso 9]>
	<xml>
		<x:ExcelWorkbook>
			<x:ExcelWorksheets>
				<x:ExcelWorksheet>
					<x:Name>Tabela Clientes</x:Name>
					<x:WorksheetOptions>
						<x:Print>
							<x:ValidPrinterInfo/>
						</x:Print>
					</x:WorksheetOptions>
				</x:ExcelWorksheet>
			</x:ExcelWorksheets>
		</x:ExcelWorkbook>
	</xml>
	<![endif]-->
</head>

<body>'.$htmlstring.'</body></html>';
echo $data;

?>