# php-pdf
## php 라이브러리의 종류
- TCPDF (https://github.com/tecnickcom/TCPDF)
- mPDF (https://github.com/mpdf)
- snappy (https://github.com/KnpLabs/snappy)
- dompdf (https://github.com/dompdf/dompdf)
- fpdf (https://github.com/Setasign/FPDF)
- FPPI (https://github.com/capgab/fpdfi)

### 헤드리스 브라우저를 사용한 방식
- https://github.com/chrome-php/chrome 이를 이용하여 렌더링된 화면을 pdf로 만드는 방식을 사용할 수 있다.
- https://github.com/spatie/browsershot 를 이용하여 랜더링된 화면을 pdf로 만드는 방식을 사용할 수 있다.

## 라이브러리 문서
- TCPDF (https://tcpdf.org/)
- mPDF (https://mpdf.github.io)
- snappy (https://knplabs.com/en)
- dompdf (https://dompdf.github.io/)

## php 라이브러리 비교
### Reference
- https://qiita.com/Rome_Victrix/items/e5dc9ad5e31c904fac92
- https://ourcodeworld.com/articles/read/226/top-5-best-open-source-pdf-generation-libraries-for-php
- https://www.pakainfo.com/php-create-pdf-file-using-mpdf-tcpdf-fpdf-php-html-to-pdf/
- https://peterdev.pl/2019/01/11/picking-a-php-tool-to-generate-pdfs/
- https://www.brianshim.com/webtricks/php-to-pdf/

#### 출력물 비교
- https://peterdev.pl/2019/01/11/picking-a-php-tool-to-generate-pdfs/

### fpdf
- CSS를 사용하는 기능이 매우 제한되어 있기 때문에 거의 텍스트를 출력하는 매우 간단한 PDF를 만들 때 이외에는 적절하지 않음
- 매우 가볍다는 것이 장점

### TCPDF
- 사용을 위해 서드파티 프로그램을 사용할 필요가 없으며 PHP 표현으로 만들 수 있다.
- CSS 스타일링이 굉장히 제한되어 있으며, 태그에 들어간 CSS만 적용한다.
- 그림 그리듯이 세밀한 조정이 필요하다는 단점이 있다고 한다.
- 나중에 https://github.com/tecnickcom/tc-lib-pdf 으로 변경되며 TCPDF는 deprecated 될 예정. 추후 이로 작성한 시스템 업데이트를 할 예정이 있다면 사용해도 좋음

### mPDF
- php 확장 프로그램을 사용한다. (PHP mbstring and gd extensions have to be loaded.) mbstring은 라라벨 필수 확장 프로그램이기 때문에 gd(서버에서 이미지 랜더링을 위한 PHP 라이브러리)를 추가적으로 설치를 해 줘야 한다.
- 사용할 수 있는 CSS 표현이 어느정도 된다. 하지만 랜더링 방식이 아니기 때문에 CSS 표현이 어느정도 제약적일 수 밖에 없다. 사용 가능한 CSS 표현으로 조절을 잘 하면 쓸만한 수준인 것으로 보임
- template를 활용할 수 있다.
- 도큐먼트가 잘 되어 있다.

### snappy
- 라라벨용 패키지를 지원한다. (https://github.com/barryvdh/laravel-snappy)
- 브라우저 엔진을 기반으로 하기 때문에 높은 수준의 HTML,JS,CSS 표현이 가능하다.
- 오래된 브라우저를 사용하기 때문에 최신 CSS, JS 문법을 지원하지 않는다.
- WKHTMLTOPDF 기반으로 CSS 랜더링을 한다. (https://github.com/wkhtmltopdf/wkhtmltopdf)
- WKHTMLTOPDF는 오래된 브라우저 엔진을 사용하기 때문에 신뢰할 수 없는 컨텐츠로 PDF를 만들 때 문제가 발생할 여지가 있다. 개선되지 않는 브라우저 엔진을 사용하기 때문에 앞으로도 취약점을 개선할 수 없어 보인다. (https://github.com/wkhtmltopdf/wkhtmltopdf/issues/4368)
- 취약점 관련 정보 : https://www.virtuesecurity.com/kb/wkhtmltopdf-file-inclusion-vulnerability-2/
- 신뢰할 수 없는 컨텐츠 없이 코드를 모두 확인하면서 만든다면 문제 없이 잘 사용할 수 있다.
- 구형 브라우저를 사용하기 때문에 다양한 서버 환경에서의 구동이 이뤄지지 않을 수 있다. (intel 이외의 CPU)

### dompdf
- 라라벨용 패키지를 지원한다. (https://github.com/barryvdh/laravel-dompdf)
- 한글을 사용할 수 없는 문제가 보고 되었다. 영어 이외의 다른 종류의 글꼴지원이 미비한 모양 (유니코드를 적절하게 랜더링할 수 있도록 글꼴 라이브러리를 따로 로드를 해야 하는 모양. 힌디어 관련 해결 방법 : https://github.com/dompdf/dompdf/issues/2174)
- CSS 2.1의 거의 모든 표현을 지원한다. 그 이상 버전의 CSS는 제한되어 있다. 간단한 CSS 렌더링에 적합할 것으로 보임
- php 확장이 필요함 : DOM extension, MBString extension, php-font-lib, php-svg-lib

## 뭘 사용해야 하나?
- 라라벨 레퍼가 있는 것이 좋긴하지만, 좀 미비한 점이 있어서 인지 아직 공식 라이브러리로 지정되지 않은 문제도 있다.
- 헤드리스 브라우저를 사용하는 방식은 아주 정확하게 만들 수 있겠지만 리소스가 많이 소모될 수 있어 보인다. 만약 렌더링이 포함된 기능을 사용해야 할 정도로 정교한 표현을 사용하려면 시스템의 캐시를 잘 활용해 줘야 하며 랜더링 리소스가 서비스의 자원을 잡아 먹지 않게 하기 위해서 굉장히 신경 써 줘야 한다.

### 서버에 부하를 주는 방식
- snappy, headless browser libraries

### 서버에 부하를 적게 주는 방식
- fpdf, TCPDF, mPDF, dompdf

### 서버에 부하를 적게 주면서 기본적인 디자인이 가능한 방식
- TCPDF, mPDF, dompdf

### 종합적인 판단
- mPDF가 적당히 쉬우면서 랜더링 결과물(https://peterdev.pl/2019/01/11/picking-a-php-tool-to-generate-pdfs)을 보았을 때 괜찮은 선택이 될 수도 있음
- dompdf는 라라벨 패키지가 있어서 사용이 용이할 것으로 생각 됨

## mpdf
### Install mpdf
```
sudo apt-get install php-mbstring
sudo apt-get install php7.4-gd
```

```
sudo apt-get install php-gd
```
- 버전을 붙이지 않으면 mpdf가 제대로 설치가 안 된다.

```
composer require mpdf/mpdf
```
- 만약 버전 호환성 때문에 설치가 되지 않는다면 무시하는 방법이 있다. 권장하지 않는 방법 (오동작 할 가능성이 높다.)
```
composer require mpdf/mpdf --ignore-platform-reqs
```

### mpdf 트러블 이슈
- https://mpdf.github.io/troubleshooting/slow.html
> On the other hand, I have used mPDF to produce a 400 page book, complete with a few images, 40 or so small tables, a table of contents and Index in approx 90 secs.

- 위 설명에서 보듯이 mpdf는 느린편이 아니다. 그런데 느리다면 문제가 있는 것. 이미지가 있어야 하는데 없는 경우 이미지를 URL으로 부터 가져오려고 한다. 이미지를 가져오는데 시간이 걸리며 이미지가 없을 경우 이미지를 받을 때까지 기다리며 이미지를 받아 오지 못하기 때문에 타임아웃이 일어날 때까지 기다리게 된다.
