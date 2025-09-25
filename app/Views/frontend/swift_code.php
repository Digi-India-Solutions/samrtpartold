<html>
	<head></head>
	<body>
	<pre>
	{ <?php echo date('d/m/Y - H:i:s',strtotime(date('Y-m-d H:i:s'))); ?>

____________________________________________________________________ 

 

 --------------------- Instance Type and Transmission -------------- 

 Notification (Transmission) of Original sent to SWIFT (ACK) 

 Network Delivery Status : Network Ack 

 Priority/Delivery : Normal 

 Message Input Reference : 1716 211111BKSACLRMAXXX8845841232 

 --------------------------- Message Header ------------------------- 

 Swift Input : FIN 103 Single Customer Credt Transfer 

 Sender : BKSACLRMXXX 

 SCOTIABANK CHILE 

 SANTIAGO CL 

 Receiver : PNBPUS3NNYC 

 WELLS FARGO BANK, N.A. 

 (NEW YORK INTERNATIONAL BRANCH) 

 NEW YORK,NY US 

 UETR : 559268fc-2af8-44d8-88c4-83957d9ceb67 

 --------------------------- Message Text --------------------------- 

 20: Sender's Reference 

 001256424 

 23B: Bank Operation Code 

 CRED 

 23E: Instruction Code 

 TELB 

 32A: Val Dte/Curr/Interbnk Settld Amt 

 Date : <?php echo date('d M Y',strtotime($order->date_added)); ?> 

 Currency : USD (US DOLLAR) 

 Amount : #<?php echo $order->total; ?># 

 50F: Ordering Customer - ID 

 /ACCT/090976629558 

 1/SOCIEDAD DE INVERSIONES E INMOBIL 

 1/IARIA BOSTON 

 2/DIEZ DE JULIO 

 3/CL/SANTIAGO 

 57A: Account With Institution - FI BIC 

 INDBINBBNDH 

 INDUSIND BANK LIMITED 

 (NEW DELHI, BARAKHAMBA) 

 NEW DELHI IN 

 59: Beneficiary Customer-Name & Addr 

 /259311210602 

 <?php echo $config['b_name']; ?>

 <?php echo $config['b_address']; ?>

 70: Remittance Information 

 FACTURA NRO. 4989 

 71A: Details of Charges 

 OUR 

 72: Sender to Receiver Information 

 /PAYPRO/ 

 --------------------------- Message Trailer ------------------------ 

 {CHK:0E8CAF94F658} 

 PKI Signature: MAC-Equivalent 

 ---------------------------- Interventions ------------------------- 

 Category : Network Report 

 Creation Time : <?php echo date('d/m/Y - H:i:s',strtotime(date('Y-m-d H:i:s'))); ?>

 Application : SWIFT Interface 

 Operator : SYSTEM 

 Text 

 

	</pre>
	</body>
</html>