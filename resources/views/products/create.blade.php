<h1>商品登録</h1>

<form action="/products" method="POST">
    @csrf

    <div>
        <label>商品名</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>在庫</label>
        <input type="number" name="stock">
    </div>

    <div>
        <label>仕入価格</label>
        <input type="number" name="cost_price">
    </div>

    <div>
        <label>販売価格</label>
        <input type="number" name="sale_price">
    </div>

    <button type="submit">登録</button>
</form>