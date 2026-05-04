<!DOCTYPE html>
<html>
<head>
    <title>Đặt hàng thành công</title>
</head>
<body>
    <h2>Cảm ơn bạn đã đặt hàng, {{ $bill->customer->name ?? 'Khách hàng' }}</h2>
    <p>Mã đơn hàng: #{{ $bill->id }}</p>
    <p>Ngày đặt: {{ $bill->date_order }}</p>
    <p>Tổng tiền: {{ number_format($bill->total) }} VNĐ</p>
    <p>Phương thức thanh toán: {{ $bill->payment }}</p>

    <h3>Chi tiết đơn hàng:</h3>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; max-width: 600px;">
        <thead>
            <tr>
                <th>Sản phẩm ID</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bill->bill_detail as $detail)
            <tr>
                <td align="center">{{ $detail->id_product }}</td>
                <td align="center">{{ $detail->quantity }}</td>
                <td align="right">{{ number_format($detail->unit_price) }}</td>
                <td align="right">{{ number_format($detail->quantity * $detail->unit_price) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng.</p>
</body>
</html>
