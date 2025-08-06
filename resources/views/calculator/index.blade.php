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

    <tr class="calculator-row">
        <td>
            <select name="items[0][category_id]" class="form-select category-select" required>
                <option value="">-</option>
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}" data-name="{{ $category->nama_category }}">
                        {{ $category->nama_category }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <select name="items[0][product_id]" class="form-select product-select" required>
                <option value="">-</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                            data-price="{{ $product->price }}" 
                            data-category="{{ $product->category_id }}"
                            data-name="{{ $product->nama_product }}">
                        {{ $product->nama_product }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <select name="items[0][otc_category]" class="form-select otc-select" required>
                <option value="FREE/MO" data-price="0">FREE/MO</option> 
                <option value="AO DISCOUNT" data-price="150000">AO DISCOUNT</option>
                <option value="AO NORMAL" data-price="500000">AO NORMAL</option>
                <option value="OTC KONTAN" data-price="2500000">OTC KONTAN</option>
                <option value="OTC PERBULAN" data-price="2500000">OTC PERBULAN</option>
            </select>
        </td>
        <td>
            <input type="number" name="items[0][qty]" class="form-control qty-input" value="1" min="1" required>
        </td>
        <td>
            <span class="price-display">Rp 0</span>
            <input type="hidden" name="items[0][price]" class="price-value" value="0">
        </td>
        <td>
            <span class="otc-display">Rp 0</span>
            <input type="hidden" name="items[0][otc]" class="otc-value" value="0">
        </td>
        <td>
            <span class="discounted-price">Rp 0</span>
        </td>
        <td>
            <span class="discounted-otc">Rp 0</span>
        </td>
        <td>
            <span class="price-times-discount">Rp 0</span>
        </td>
        <td>
            <span class="otc-times-discount">Rp 0</span>
        </td>
        <td>
            <input type="number" name="items[0][duration]" class="form-control duration-input" min="1" value="1" required style="width: 80px;">
        </td>
        <td>
            <span class="monthly-otc">Rp 0</span>
        </td>
        <td>
            <span class="monthly-price">Rp 0</span>
        </td>
        <td>
            <span class="monthly-price-ppn">Rp 0</span>
        </td>
        <td>
            <span class="yearly-price">Rp 0</span>
        </td>
        <td>
            <span class="final-price-ppn text-success">Rp 0</span>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </td>
    </tr>
</tbody>
                        <tr class="calculator-row">
                            <td>
                                <select name="items[0][category_id]" class="form-select category-select" required>
                                    <option value="">-</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->nama_category }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="items[0][product_id]" class="form-select product-select" required>
                                    <option value="">-</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}"
                                            data-price="{{ $product->price }}"
                                            data-discount="{{ $product->discount_price }}"
                                            data-category="{{ $product->category_id }}">
                                            {{ $product->nama_product }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="items[0][otc_category]" class="form-select otc-select" required>
                                    <option value="OTC KONTAN" data-price="0">OTC KONTAN</option>
                                    <option value="AO DISCOUNT" data-price="150000">AO DISCOUNT</option>
                                    <option value="AO NORMAL" data-price="500000">AO NORMAL</option>
                                </select>
                            </td>
                            <td><input type="number" name="items[0][qty]" class="form-control qty-input" value="1" min="1" required></td>
                            <td><span class="price-display">Rp 0</span><input type="hidden" name="items[0][price]" class="price-value" value="0"></td>
                            <td><span class="otc-display">Rp 0</span><input type="hidden" name="items[0][otc]" class="otc-value" value="0"></td>
                            <td><span class="discounted-price">Rp 0</span></td>
                            <td><span class="discounted-otc">Rp 0</span></td>
                            <td><span class="price-times-discount">Rp 0</span></td>
                            <td><span class="otc-times-discount">Rp 0</span></td>
                            <td><input type="number" name="items[0][duration]" class="form-control duration-input" min="1" value="1" required style="width: 80px;"></td>
                            <td><span class="monthly-otc">Rp 0</span></td>
                            <td><span class="monthly-price">Rp 0</span></td>
                            <td><span class="monthly-price-ppn">Rp 0</span></td>
                            <td><span class="yearly-price">Rp 0</span></td>
                            <td><span class="final-price-ppn text-success">Rp 0</span></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash"></i> Hapus</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<template id="row-template">
    <tr class="calculator-row">
        <td>
            <select name="items[][category_id]" class="form-select category-select" required>
                <option value="">-</option>
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}" data-name="{{ $category->nama_category }}">{{ $category->nama_category }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select name="items[][product_id]" class="form-select product-select" required>
                <option value="">-</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                            data-price="{{ $product->price }}" 
                            data-category="{{ $product->category_id }}"
                            data-name="{{ $product->nama_product }}">
                        {{ $product->nama_product }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <select name="items[][otc_category]" class="form-select otc-select" required>
                <option value="FREE/MO" data-price="0">FREE/MO</option>
                <option value="AO DISCOUNT" data-price="150000">AO DISCOUNT</option>
                <option value="AO NORMAL" data-price="500000">AO NORMAL</option>
                <option value="OTC KONTAN" data-price="2500000">OTC KONTAN</option>
                <option value="OTC PERBULAN" data-price="2500000">OTC PERBULAN</option>
            </select>
        </td>
        <td>
            <input type="number" name="items[0][qty]" class="form-control qty-input" value="1" min="1" required>
        </td>
        </td>
            <span class="price-display">Rp 0</span>
            <input type="hidden" name="items[][price]" class="price-value" value="0">
        </td>
        <td>
            <span class="otc-display">Rp 0</span>
            <input type="hidden" name="items[][otc]" class="otc-value" value="0">
        </td>
        <td>

            <!-- Diskon PRICE (%) -->
    <td>
        <input type="number" class="form-control disc-price-input" name="items[][disc_price]" value="0" min="0" max="100" style="width: 80px;">%
    </td>
            <span class="price-with-ppn text-primary">Rp 0</span>
        </td>
        <td>
            <input type="number" name="items[][duration]" class="form-control duration-input" 
                   min="1" value="1" required style="width: 80px;">
        </td>
        <td>
            <span class="price-duration text-info">Rp 0</span>
        </td>
        <td>
            <span class="final-price-no-ppn text-warning">Rp 0</span>
        </td>
        <td>
            <span class="final-price text-success">Rp 0</span>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    </tr>
</template>
@endsection

@push('scripts')
<script>
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('product-select')) {
        const row = e.target.closest('.calculator-row');
        const selected = e.target.selectedOptions[0];
        const price = parseFloat(selected.dataset.price) || 0;
        const discount = parseFloat(selected.dataset.discount) || 0;
        row.querySelector('.price-value').value = price;
        row.querySelector('.price-display').textContent = formatCurrency(price);
        row.querySelector('.discounted-price').textContent = formatCurrency(discount);
        row.querySelector('.price-times-discount').textContent = formatCurrency(price * discount);
        updateRow(row);
    }
    if (e.target.classList.contains('otc-select')) {
        const row = e.target.closest('.calculator-row');
        const selected = e.target.selectedOptions[0];
        const otcPrice = parseFloat(selected.dataset.price) || 0;
        row.querySelector('.otc-value').value = otcPrice;
        row.querySelector('.otc-display').textContent = formatCurrency(otcPrice);
        row.querySelector('.otc-times-discount').textContent = formatCurrency(otcPrice * 1);
        updateRow(row);
    }
    if (e.target.classList.contains('category-select')) {
        const row = e.target.closest('.calculator-row');
        const categoryId = e.target.value;
        const productSelect = row.querySelector('.product-select');
        productSelect.value = '';
        Array.from(productSelect.options).forEach(option => {
            option.style.display = option.dataset.category === categoryId || option.value === '' ? 'block' : 'none';
        });
        row.querySelector('.price-value').value = 0;
        row.querySelector('.price-display').textContent = formatCurrency(0);
        updateRow(row);
    }
});

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
    const priceDuration = priceWithPPN * duration;
    const finalPriceNoPPN = (price * duration) + otc;
    const finalPrice = priceDuration + (otc * 1.11);
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
        const priceDuration = priceWithPPN * duration;
        const finalPriceNoPPN = (price * duration) + otc; 
        const finalPrice = priceDuration + (otc * 1.11);
        const discountedPrice = price * qty * (1 - discountPercentage);
        
        row.querySelector('.price-with-ppn').textContent = formatCurrency(priceWithPPN);
        row.querySelector('.price-duration').textContent = formatCurrency(priceDuration);
        row.querySelector('.final-price-no-ppn').textContent = formatCurrency(finalPriceNoPPN);
        row.querySelector('.final-price').textContent = formatCurrency(finalPrice);
        
        updateGrandTotal();
    }

    function updateGrandTotal() {
        let total = 0;
        document.querySelectorAll('.calculator-row').forEach(row => {
            const price = parseFloat(row.querySelector('.price-value').value) || 0;
            const otc = parseFloat(row.querySelector('.otc-value').value) || 0;
            const duration = parseInt(row.querySelector('.duration-input').value) || 1;
            
            // Hanya hitung jika ada price yang dipilih (bukan 0)
            if (price > 0) {
                const priceWithPPN = calculatePPN(price);
                const priceDuration = priceWithPPN * duration;
                const finalPrice = priceDuration + (otc * 1.11);
                total += finalPrice;
            }
        });
        
        document.getElementById('grandTotal').textContent = formatCurrency(total);
    }

    function updateRowIndices() {
        document.querySelectorAll('.calculator-row').forEach((row, index) => {
            row.querySelectorAll('select, input').forEach(field => {
                if (field.name) {
                    field.name = field.name.replace(/\[\d*\]/, `[${index}]`);
                }
            });
        });
    }

    function validateForm() {
        const title = document.getElementById('calculationTitle').value.trim();
        if (!title) {
            alert('Silakan masukkan judul kalkulasi terlebih dahulu!');
            return false;
        }

        const rows = document.querySelectorAll('.calculator-row');
        for (let row of rows) {
            const categorySelect = row.querySelector('.category-select');
            const productSelect = row.querySelector('.product-select');
            
            if (!categorySelect.value || !productSelect.value) {
                alert('Pastikan semua baris telah dipilih kategori dan produknya!');
                return false;
            }
        }
        return true;
    }

    function collectFormData() {
        const title = document.getElementById('calculationTitle').value.trim();
        const items = [];
        
        document.querySelectorAll('.calculator-row').forEach(row => {
            const categorySelect = row.querySelector('.category-select');
            const productSelect = row.querySelector('.product-select');
            const otcSelect = row.querySelector('.otc-select');
            
            const categoryOption = categorySelect.selectedOptions[0];
            const productOption = productSelect.selectedOptions[0];
            
            items.push({
                category_name: categoryOption ? categoryOption.dataset.name : '',
                product_name: productOption ? productOption.dataset.name : '',
                otc_category: otcSelect.value,
                price: parseFloat(row.querySelector('.price-value').value) || 0,
                otc: parseFloat(row.querySelector('.otc-value').value) || 0,
                duration: parseInt(row.querySelector('.duration-input').value) || 1
            });
        });
        
        return { title, items };
    }

    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('product-select')) {
            const row = e.target.closest('.calculator-row');
            const selected = e.target.selectedOptions[0];
            const price = parseFloat(selected.dataset.price) || 0;
            
            row.querySelector('.price-value').value = price;
            row.querySelector('.price-display').textContent = formatCurrency(price);
            updateRow(row);
        }
        
        if (e.target.classList.contains('otc-select')) {
            const row = e.target.closest('.calculator-row');
            const selected = e.target.selectedOptions[0];
            const otcPrice = parseFloat(selected.dataset.price) || 0;
            
            row.querySelector('.otc-value').value = otcPrice;
            row.querySelector('.otc-display').textContent = formatCurrency(otcPrice);
            updateRow(row);
        }
        
        if (e.target.classList.contains('category-select')) {
            const row = e.target.closest('.calculator-row');
            const categoryId = e.target.value;
            const productSelect = row.querySelector('.product-select');
            
            // Filter products by category
            Array.from(productSelect.options).forEach(option => {
                if (option.value === '') {
                    option.style.display = 'block';
                } else {
                    option.style.display = option.dataset.category === categoryId ? 'block' : 'none';
                }
            });
            
            productSelect.value = '';
            row.querySelector('.price-value').value = 0;
            row.querySelector('.price-display').textContent = formatCurrency(0);
            updateRow(row);

        if (price > 0) {
            const priceWithPPN = calculatePPN(price);
            const priceDuration = priceWithPPN * duration;
            const finalPrice = priceDuration + (otc * 1.11);
            total += finalPrice;
        }
    });
    document.getElementById('grandTotal').textContent = formatCurrency(total);
}
</script>
@endpush