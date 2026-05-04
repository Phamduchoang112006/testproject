<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật trạng thái đơn hàng</title>
</head>
<body>
    <h2>Xin chào {{ $bill->customer->name ?? 'Khách hàng' }},</h2>
    <p>Đơn hàng <strong>#{{ $bill->id }}</strong> của bạn đã được cập nhật trạng thái.</p>
    <p>Trạng thái hiện tại: <strong>{{ $bill->status }}</strong></p>
    <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
</body>
</html>
