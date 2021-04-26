// JavaScript Document
function judgement( strDate, strFromForeign = '', strToForeign = '', strDatum = '', strDatumHome = '' ){
	var ret = Array();
	ret['age'] = 0;
	ret['foreign'] = '0';
	ret['home'] = '0';
	var judgeDate = new Date(strDate);
	var fromForeign, toForeign, datumDate, datumHome, wkDate;
	var fromForeignBK, toForeignBK, datumDateBK, datumHomeBK;
	//海外滞在日付
	if( strFromForeign == '' ){
		fromForeign = new Date(strDate);
	} else {
		fromForeign = new Date(strFromForeign);
	}
	if( strToForeign == '' ){
		toForeign = new Date(strDate);
	} else {
		toForeign = new Date(strToForeign);
	}
	//基準日付
	if( strDatum == '' ){
		datumDate = new Date();
	} else {
		datumDate = new Date(strDatum);
	}
	datumDateBK = new Date(datumDate);
	if( strDatumHome == '' ){
		datumHome = new Date();
	} else {
		datumHome = new Date(strDatumHome);
	}
	
	//基準日付での年齢による判定
  var i = -1;
	judgeDate.setFullYear(judgeDate.getFullYear() + 12);
  do {
    i += 1;
		datumDate = new Date(datumDateBK);
		datumDate.setFullYear(datumDate.getFullYear() + i);
  }	while( judgeDate > datumDate );
  ret['age'] = i; //戻り値:入学可能年(経過年数)

	//基準日付と帰国日付を比較
  datumHome.setFullYear(datumHome.getFullYear() + i); //年齢基準を満たすタイミングへの基準変更
	if( datumHome < toForeign ){
		toForeign = new Date( datumHome );
	}
	//海外滞在5期間判定
	toForeignBK = new Date(toForeign);
	toForeign.setFullYear(toForeign.getFullYear() - 5)
	if( toForeign >= fromForeign ){
		ret['foreign'] = 5;
	} else {
		toForeign = new Date(toForeignBK);
		toForeign.setFullYear(toForeign.getFullYear() - 2)
		if( toForeign >= fromForeign ){
			ret['foreign'] = 2;
		} else {
			ret['foreign'] = 0;
		}
	}
	toForeign = new Date(toForeignBK);

	//帰国タイミング
	datumHomeBK = new Date(datumHome);
	datumHome.setFullYear(datumHome.getFullYear() - 3);
	if( datumHome > toForeign ){
		ret['home'] = 3;
	} else {
		datumHome = new Date(datumHomeBK);
		datumHome.setFullYear(datumHome.getFullYear() - 2);
		datumHome.setMonth(datumHome.getMonth() - 6);
		if( datumHome > toForeign ){
			ret['home'] = 2.5;
		} else {
			ret['home'] = 0;
		}
	}
	var retcode = '残念ながら国際学級の出願資格を満たしておりません。一般学級への出願をご検討ください。<br>※上記結果は当校の規定に基づいて判定をしております。個々の事情やケースについては下記よりお問い合わせ下さい。<br><div class="time-btn-area"><a href="/contact/international/failure" class="formbutton">＞お問い合わせフォームへ</a></div>';
	if( ret['home'] == 3 ){
		return retcode;
	}
	if( ret['home'] == 2.5 && ret['foreign'] != 5 ){
		return retcode;
	}
	if( ret['home'] == 0 && ret['foreign'] == 0 ){
		return retcode;
	}
	if( ret['age'] == 0 ){
		retcode = '2020年度の受験資格がございます。一時帰国の方で、学校見学をご希望の方は下記よりお問い合わせください。<br><div class="time-btn-area"><a href="/contact/international/pass" class="formbutton">お問い合わせフォームへ</a></div>';
	} else {
		retcode = '202' + i + '年度の受験資格がございます。一時帰国の方で、学校見学をご希望の方は下記よりお問い合わせください。<br><div class="time-btn-area"><a href="/contact/international/pass" class="formbutton">＞お問い合わせフォームへ</span></a></div>';
	}
	return retcode;
}
