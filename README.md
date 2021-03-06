# Nagoya.php #12 コーディング問題への回答

Nagoya.php #12  https://nagoyaphp.connpass.com/event/81154/
問題 http://nabetani.sakura.ne.jp/hena/ord9busfare/
全ケーステストが通るまでのコーディング所要時間…約2時間

## 発想のメモ

- ユーザー属性のバリエーション… 大人・子供・幼児
- 料金区分のバリエーション…通常・福祉・定期券
- 料金割引率のバリエーション…10割と5割と5割×5割

ユーザー属性のバリエーションは増えそうだと思った。（「老人」が追加されるとか）
料金割引率は変わりそうだと思った。（福祉が5割でなく8割になるとか）

## 私の実装の強いところ

ユーザー属性のバリエーションが増えてもPassenger周り（Passengerクラス自体、PassengerFactory周り）とFareDefinitionの追加だけで対応できる。
料金割引率が変わってもFareDefinition内の定義を変えるだけで対応できる。

## 私の実装の弱いところ

通常料金から値引きの方法が「割引」じゃなくなったら（福祉は通常料金から100円引きとか）このままでは対応できない。
たつきち( @ttskch )さんの実装だとこの変更パターンに強そう。

## 気になったこと

### 問題文は「大人1人につき幼児2人まで無料」だが、子供と幼児のみの場合はどうなるのか？

子供と幼児だけなら幼児は無料になるのか？ということ。<br/>
たとえば名古屋市交通局は小学生と幼児のみのグループの場合、小学生は保護者として同伴幼児2人まで無料にできる。（つまり問題で言う大人の役割を果たしうる）<br/>
http://www.kotsu.city.nagoya.jp/jp/pc/TICKET/TRP0000131.htm

問題文で提供されたテストケースに子供と幼児だけの入力があり、計算結果を見ると小学生は保護者になれないという結果だったのでこのケースは考えなくて良くなった。

### 2回半額にするパターン（幼児か子供で福祉の場合）のとき、半額にして切り上げ→半額にして切り上げと計算すべきでは？

発表時に会場で指摘されたやつ。
問題文で提供されたテストが落ちたら考えようと思ったら落ちなかったので無視していた。
実際どうなのか調べてみようと思っていた。

名古屋市交通局のバスは切り上げでなく切り捨てなのでサンプルがなく不明。
http://www.kotsu.city.nagoya.jp/jp/pc/SUBWAY/TRP0000172.htm

名鉄バスは問題文と同じ切り上げだったが、料金一覧表が見つからず断念。
