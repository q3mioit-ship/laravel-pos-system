//
window.openStockModal = function (type) {

    const modal = document.getElementById('stockModal');
    const form = document.getElementById('stockForm');
    const title = document.getElementById('modalTitle');

    modal.classList.remove('hidden');

    if (type === 'increase') {
        title.innerText = '在庫を追加';
        form.action = `/products/${productId}/stock/increase`;
    } else {
        title.innerText = '在庫を減らす';
        form.action = `/products/${productId}/stock/decrease`;
    }
}

window.closeStockModal = function () {
    document.getElementById('stockModal').classList.add('hidden');
}