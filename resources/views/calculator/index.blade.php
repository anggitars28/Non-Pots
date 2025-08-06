@extends('layouts.app')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Kalkulator Paket</h4>
            <span class="badge bg-secondary">Total Produk: {{ count($products) }}</span>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Judul Kalkulasi</label>
            <input type="text" class="form-control" placeholder="Masukkan judul kalkulasi..." id="calculationTitle">
        </div>

        <form id="calculatorForm">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered" id="calculatorTable">
                    <thead>
                        <tr>
                            <th>Category Product</th>
                            <th>Product Name</th>
                            <th>Skema</th>
                            <th>Qty</th>
                            <th>Price (Rp)</th>
                            <th>OTC (Rp)</th>
                            <th>Discont Price</th>
                            <th>Discont OTC</th>
                            <th>Price x Discount</th>
                            <th>OTC x Discount</th>
                            <th>Duration (Bulan)</th>
                            <th>OTC</th>
                            <th>Monthly Price</th>
                            <th>Monthly Price with PPN</th>
                            <th>Year Price</th>
                            <th>Final Price with PPN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="calculatorRows">
                        <!-- baris pertama dimunculkan via JS -->
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="button" id="addRow" class="btn btn-success">
                    <i class="fas fa-plus"></i> Tambah Baris
                </button>

                <div class="d-flex align-items-center">
                    <span class="me-3"><strong>Total Keseluruhan: <span id="grandTotal" class="text-danger">Rp 0</span></strong></span>
                    <button type="button" class="btn btn-secondary me-2" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="button" class="btn btn-navy" id="printPdfBtn">
                        <i class="fas fa-file-pdf"></i> Print PDF
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
const categories = @json($categories);
const products = @json($products);

function formatCurrency(amount) {
    return 'Rp ' + new Intl.NumberFormat('id-ID').format(Math.round(amount));
}

function calculatePPN(price) {
    return price * 1.11;
}

function updateRow(row) {
    const price = parseFloat(row.querySelector('.price-value').value) || 0;
    const discount = parseFloat(row.querySelector('.discounted-price').textContent.replace(/[^\d]/g, '')) || 0;
    const otc = parseFloat(row.querySelector('.otc-value').value) || 0;
    const duration = parseInt(row.querySelector('.duration-input').value) || 1;
    const priceWithPPN = calculatePPN(price);
    const finalPrice = priceWithPPN * duration + (otc * 1.11);
    row.querySelector('.monthly-price').textContent = formatCurrency(price);
    row.querySelector('.monthly-price-ppn').textContent = formatCurrency(priceWithPPN);
    row.querySelector('.yearly-price').textContent = formatCurrency(price * 12);
    row.querySelector('.final-price-ppn').textContent = formatCurrency(finalPrice);
}

function updateGrandTotal() {
    let total = 0;
    document.querySelectorAll('.calculator-row').forEach(row => {
        const price = parseFloat(row.querySelector('.price-value').value) || 0;
        const otc = parseFloat(row.querySelector('.otc-value').value) || 0;
        const duration = parseInt(row.querySelector('.duration-input').value) || 1;
        const priceWithPPN = calculatePPN(price);
        const finalPrice = priceWithPPN * duration + (otc * 1.11);
        total += finalPrice;
    });
    document.getElementById('grandTotal').textContent = formatCurrency(total);
}

function createRow(index) {
    const categoryOptions = categories.map(c => `<option value="${c.category_id}">${c.nama_category}</option>`).join('');
    const productOptions = products.map(p => `<option value="${p.id}" data-price="${p.price}" data-discount="${p.discount_price}" data-category="${p.category_id}">${p.nama_product}</option>`).join('');

    return `
<tr class="calculator-row">
    <td>
        <select name="items[${index}][category_id]" class="form-select category-select" required>
            <option value="">-</option>${categoryOptions}
        </select>
    </td>
    <td>
        <select name="items[${index}][product_id]" class="form-select product-select" required>
            <option value="">-</option>${productOptions}
        </select>
    </td>
    <td>
        <select name="items[${index}][otc_category]" class="form-select otc-select" required>
            <option value="OTC KONTAN" data-price="0">OTC KONTAN</option>
            <option value="OTC PERBULAN" data-price="0">OTC PERBULAN</option>
        </select>
    </td>
    <td><input type="number" name="items[${index}][qty]" class="form-control qty-input" value="1" min="1" required></td>
    <td><span class="price-display">Rp 0</span><input type="hidden" name="items[${index}][price]" class="price-value" value="0"></td>
    <td><span class="otc-display">Rp 0</span><input type="hidden" name="items[${index}][otc]" class="otc-value" value="0"></td>
    <td><span class="discounted-price">Rp 0</span></td>
    <td><span class="discounted-otc">Rp 0</span></td>
    <td><span class="price-times-discount">Rp 0</span></td>
    <td><span class="otc-times-discount">Rp 0</span></td>
    <td><input type="number" name="items[${index}][duration]" class="form-control duration-input" value="1" min="1" style="width: 80px;" required></td>
    <td><span class="monthly-otc">Rp 0</span></td>
    <td><span class="monthly-price">Rp 0</span></td>
    <td><span class="monthly-price-ppn">Rp 0</span></td>
    <td><span class="yearly-price">Rp 0</span></td>
    <td><span class="final-price-ppn text-success">Rp 0</span></td>
    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i> Hapus</button></td>
</tr>`;
}

// Tambah baris
document.getElementById('addRow').addEventListener('click', () => {
    const tbody = document.getElementById('calculatorRows');
    const index = tbody.querySelectorAll('.calculator-row').length;
    tbody.insertAdjacentHTML('beforeend', createRow(index));
});

// Hapus baris
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-row')) {
        e.target.closest('.calculator-row').remove();
        updateGrandTotal();
    }
});

// Reaktivasi perubahan input
document.addEventListener('change', function(e) {
    if (e.target.closest('.calculator-row')) {
        const row = e.target.closest('.calculator-row');
        updateRow(row);
        updateGrandTotal();
    }

    if (e.target.classList.contains('category-select')) {
        const row = e.target.closest('.calculator-row');
        const categoryId = e.target.value;
        const productSelect = row.querySelector('.product-select');
        productSelect.value = '';
        Array.from(productSelect.options).forEach(option => {
            option.style.display = option.dataset.category === categoryId || option.value === '' ? 'block' : 'none';
        });
    }
});

// Tambahkan satu baris default saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', function () {
    const tbody = document.getElementById('calculatorRows');
    tbody.insertAdjacentHTML('beforeend', createRow(0));
});
</script>
@endpush