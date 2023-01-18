<?php

// testing lang this; array list lang

function get_gw_branches()
{
   return $branches = [
		'Select Branch',
		'ALL',
		'BMW-CARS',
        'BMW-MOTORRAD',
		'CHERY-CEBU',
		'CHERY-CLARK',
		'CHERY-NUEVA ECIJA',
		'CHERY-PASAY',
		'CHEVROLET-PASAY',
		'CHEVROLET-PILI',
		'FOTON-TALISAY',
		'FOTON-NUEVA ECIJA',
		'FOTON-LIPA',
        'FUSO-LIPA',
		'FUSO-PASAY',
		'GAC-PASONG TAMO',
		'GEELY-ANGELES',
		'GEELY-ASEANA',
		'GEELY-BATANGAS',
		'GEELY-DUMAGUETE',
		'GEELY-GORORDO',
        'GEELY-LIPA',
		'GEELY-LUCENA',
		'GEELY-MAGUIKAY',
		'GEELY-NAGA',
		'GEELY-PASAY',
		'GEELY-SANPABLO',
		'GEELY-SANTAROSA',
        'GEELY-TARLAC',
		'HONDA-FAIRVIEW',
        'HONDA-MARCOS HIGHWAY',
		'HONDA-ISABELA',
		'HONDA-CAINTA',
		'HYUNDAI-PASONG TAMO',
		'KIA-CAINTA',
		'KIA-CDO',
		'KIA-ILIGAN',
		'KIA-MANDAUE',
        'KIA-TALISAY',
        'KIA-STO TOMAS',
        'KIA-GORORDO',
		'KIA-OZAMIS',
        'KIA-SANPABLO',
		'KIA-DASMARIÑAS',
		'KIA-ZAMBOANGA',
		'MAXUS-CDO',
		'MITSUBISHI-CDO',
        'MITSUBISHI-BACOLOD',
		'MITSUBISHI-BUHANGIN',
		'MITSUBISHI-BUHANGIN-YARD',
		'MITSUBISHI-DIGOS',
		'MITSUBISHI-CEBU',
        'MITSUBISHI-FAIRVIEW',
        'MITSUBISHI-QUEZON AVENUE',
        'MITSUBISHI-MATINA',
		'MITSUBISHI-PANABO',
        'MITSUBISHI-SUCAT',
		'MITSUBISHI-TALISAY',
		'MITSUBISHI-VALENCIA',
		'MG-BUTUAN',
        'MG-BOHOL',
		'MG-BATANGAS',
		'MG-CAINTA',
		'MG-CALAMBA',
		'MG-GORORDO',
		'MG-ILIGAN',
        'MG-ISABELA',
		'MG-LAS PINAS',
		'MG-MARILAO',
		'MG-MINGLANILLIA',
        'MG-PASAY',
        'MG-SANPABLO',
		'MG-SANTOTOMAS',
		'MG-PILI',
        'MG-VALENCIA',
		'NISSAN-ABADSANTOS',
		'NISSAN-ALABANG',
		'NISSAN-BGC',
		'NISSAN-BACOOR',
		'NISSAN-DASMARIÑAS',
        'NISSAN-SMSEASIDE',
        'NISSAN-KIDAPAWAN',
        'NISSAN-MANILABAY',
		'NISSAN-MANTRADE',
		'NISSAN-MATINA',
		'NISSAN-OTIS',
		'NISSAN-PALAWAN',
		'NISSAN-PASAY',
		'NISSAN-SUCAT',
		'NISSAN-TAGUM',
		'NISSAN-TALISAY',
		'NISSAN-VRAMA',
		'PEUGEOT-PASIG',
		'PEUGEOT-GORORDO',
		'PEUGEOT-MAKATI',
		'PEUGEOT-STA ROSA',
        'SUBARU-ANGELES',
		'SUBARU-ALABANG',
		'SUBARU-PILI',
		'SUZUKI-PALAWAN',
        'SUZUKI-ALAMINOS',
		'SUZUKI-SANPABLO',
        'SUZUKI-STO TOMAS',
		'SUZUKI-LUCENA',
		'SUZUKI-MINDORO',
		'VOLKSWAGEN-CDO',
        'STOCK',
		'MARKANE',
        'OTHERS',
		'GATEWAY',
		'GATEWAY-NORTH',
		'GATEWAY-SUPER NORTH',
		'GATEWAY-SOUTH',
		'GATEWAY-SUPER SOUTH',
		'GATEWAY-CEBU',
		'GATEWAY-DAVAO',
		'GATEWAY-CDO',
		'GATEWAY-VISAYAS',
		'EXTERNAL'
    ];
}


function get_gw_departments()
{
    return $departments = [
		'ACCOUNTING',
		'ACCOUNTING ADMIN',
		'BRANCH-OP',
		'BRP',
		'BPM',
		'CASHIER',
		'CREDIT & COLLECTION',
		'CRU',
		'DEALER DEV',
        'EXECUTIVE',
		'FINANCE',
		'FINANCIAL REPORT & BIR COMPLIANCE',
		'GENERAL',
		'HR', 
		'INSURANCE',
		'IT', 
		'LTO',
		'MARKETING',
        'PARTS', 
		'PURCHASING',
        'SERVICE', 
        'SALES',
		'WHOLESALE',
		'ISP',
		'VENDOR',
    ];
}

function get_gw_priorities()
{
    return $priorities = ['Low', 'Normal', 'Important', 'Urgent', 'Critical'];
}

function get_gw_status()
{   
    return $status = [
        'Not yet started',
        'Started',
		'Done',
        'In-progress',
        'For Confirmation',
        'For Follow-up',
        'For PO Creation',
        'For Request',
        'For Approval',
        'For Allocation',
        'For Delivery',
        'For Verification',
		'For Funding',
        'For Assessment',
        'For Immediate Action',
		'For Schedule',
		'For Pickup',
		'For Warranty',
        'With PO',
        'Ordered',
        'Monitoring',
        'Suspend',
        'Scheduled',
        'Delivered',
		'Available',
		'Partial Delivered',
		'Requested',
		'Reserved',
		'Waiting for Delivery',
        'Recommend external solution',
        'Modified',
		'Deployed',
		'Used',
        'Closed',
		'Released'
    ];
}

function get_gw_items()
{
	return $item = [
		'Desktop',
		'Laptop',
		'Printer',
		'Router',
		'Firewall',
		'Network switch',
		'Access Point',
		'Telephone',
		'CCTV',
		'Mobile Gadgets',
		'Biometric',
		'Digital Key',
		'License Key',
		'Installer',
		'IT Comsumables',
		'Toner',
		'Ink',
		'Projector'
	];
}

function get_gw_subject()
{
	return $subject = [
		'Task',
		'Reminder',
		'Concern',
		'Purchase',
		'Request for PO',
		'Project',
		'Gatepass',
		'Funds',
		'For Repair',
		'Email Accounts',
		'OB Pass',
		'Job Request',
		'Travel',
		'Item Pullout',
		'Others',
		'Meeting'
	];

}

function get_gw_approved()
{
	return $approved_by = [
		'',
		'ERAILE BRUAN',
		'DAN AVERGONZADO',
		'MECHIO PEPITO'	
	];
}

function get_internet_provider()
{
	return $internet_provider = [
		'Select Provider',
		'PLDT',
		'EASTERN TELECOMMUNICATIONS PHILIPPINES, INC ',
		'RESPONSIBLE INTERNET SUSTAINABILITY EFFORT INC.',
		'CONVERGE ICT SOLUTIONS INC.',
		'GLOBE TELECOM',
		
	];
}

function get_account_type()
{
	return $account_type = [
		'Select Account type',
		'Internet',
		'SIP',
		'PABX'
	];
}

function get_purchase_category()
{
	return $category = [
		'Billing',
		'IT-Office Equipment',
		'IT-Network Device',
		'IT-Miscellaneous',
		'IT-Peripherals',
		'IT-End User Device',
		'IT-Tools',
		'IT-License Subscription',
		'IT-Security Devices',
		'IT-Surveillance Device'
	];
}

function get_item_pullout_category()
{
	return $category = [
		'Item Transfer',
		'Pullout from Inventory',
		'Item Borrow'
	];
}

function get_task_category()
{
	return $category = [
		'Support - Onsite',
		'Support - Remote',
		'Device - Installation',
		'Software - Installation',
		'Troubleshoot - Internet',
		'Troubleshoot - LAN Connection',
		'Troubleshoot - PC',
		'Troubleshoot - Laptop',
		'Troubleshoot - Printer',
		'Troubleshoot - Voice/Telephone',
		'Item Deployment',
		'Email Accounts',
		'Account Creation',
		'Meeting',
		'Reminder',
		'Documentation',
		'Others'
	];
}

function get_project_category()
{
	return $category = [
		'Infrastructure',
		'Biometric',
		'Internet',
		'Web Design',
		'System Development',
		'Trunkline',
		'Security'		
	];
}
	
?>