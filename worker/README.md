# Working with RabbitMQ in PHP

A collection of samples for working with RabbitMQ in PHP.

## RabbitMQ use cases

RabbitMQ can be used for more advanced scenarios.

The most popular cases can be used as follows:

1. For long-running processes and background jobs (Các quy trình chạy dài và công việc nền)
2. As the middleman in between microservices

### 1. For long-running processes and background jobs

Các quy trình chạy dài và công việc nền

Khi các yêu cầu mất một lượng thời gian đáng kể, thì đó là kịch bản hoàn hảo để kết hợp hàng đợi tin nhắn.

Hãy tưởng tượng một dịch vụ web xử lý nhiều yêu cầu mỗi giây và không thể để mất một yêu cầu nào trong bất kỳ trường hợp nào. 
Ngoài ra, các yêu cầu được xử lý thông qua các quy trình tốn thời gian, nhưng hệ thống không thể để bị sa lầy. Một số ví dụ thực tế có thể bao gồm:

1. Images Scaling 
2. Sending large/many emails 
3. Search engine indexing 
4. File scanning 
5. Video encoding 
6. Delivering notifications 
7. PDF processing 
8. Calculations

### 2. As the middleman in between microservices

Người trung gian giữa các microservice.

Đối với giao tiếp và tích hợp trong và giữa các ứng dụng, tức là với tư cách là người trung gian giữa các vi dịch vụ, hàng đợi tin nhắn cũng hữu ích. Hãy nghĩ về một hệ thống cần thông báo cho một phần khác của hệ thống để bắt đầu thực hiện một tác vụ hoặc khi có nhiều yêu cầu đến cùng một lúc, như trong các tình huống sau:

1. Order handling (Order placed, update order status, send an order, payment, etc.)
2. Food delivery service (Place an order, prepare an order, deliver food)
3. Any web service that needs to handle multiple requests

### Examples

**Example 1: Send Email with PDF Invoice after make payment**

Workflow

1. User make a payment.
2. System generate PDF Invoice
3. System send an email for invoice with attacth PDF file to user.

**Example 2: Scale/ Crop Images**

Need to crop images to multiple size for thumbnail with small size, featured image medium size, and for mobile screen.

> Scenario: If many images might be added at the same time, the system might cause timeout errors when the scaling or crop images.

Workflow

1. User upload images
2. System do scaling, crop images size as follows: 150px x 150px, ..etc
3. System store these images to disk or upload to AWS S3.


## Quickstart

**Pre-requites:**

- PHP 8.1
- Composer 2.x

## Useful CLI

For easy working worker like start, run I created a simple CLI app for this project.

Display Helps

```shell
./prabbit help
```

Say Hello

```shell
 ./prabbit hello Quan
 
# Hello Quan!!!
```

Get users from database with limit = 10

```shell
./prabbit user all 10

##### Result

#    [RUN] prabbit all 10
#    
#    Array
#    (
#        [0] => Worker\Shared\Models\UserPdo Object
#            (
#                [table:protected] => users
#                [id] => 1
#                [first_name] => Quan
#                [last_name] => Vu
#            )
#    
#        [1] => Worker\Shared\Models\UserPdo Object
#            (
#                [table:protected] => users
#                [id] => 2
#                [first_name] => David
#                [last_name] => Beckham
#            )
#    
#    )

```

## Examples




