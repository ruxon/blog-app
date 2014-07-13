<?php if (!defined('RUXON_VALID')) die("Access Denied!");?>
<html>
<head id="header">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $this->getMetaTitle()?></title>
<style>
        .invoice-error {
            margin: 24px;
            padding: 24px;
            border: solid red 1px;
            color: red;
            font-weight: bold;
        }
        body {font-size: 10pt;}
        h1 {font-size: 12pt;}
        p, ul, ol, h1 {margin-top:6px; margin-bottom:6px}
        td {font-size: 9pt; padding-left: 4px;}
        td.small {font-size: 7pt;}
        small {font-size: 7pt;}
        .u {
            text-decoration: underline;
            margin-left: 2px;
            margin-right: 2px;
        }
        #invoice {}
        #invoice table.tbl {
            border-left: solid 2px black;
            border-top: solid 2px black;
            width: 620px;
        }
        #invoice table.tbl td {
            border-right: solid 2px black;
            border-bottom: solid 2px black;
            padding: 2px 6px;
        }
    </style>
</head>
<body>
    <?php echo $this->getContent();?>
</body>
</html>