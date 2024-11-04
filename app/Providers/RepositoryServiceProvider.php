<?php

namespace App\Providers;

use App\Interface\Repository\BillDetailRepositoryInterface;
use App\Interface\Repository\BillPaymentChequeRepositoryInterface;
use App\Interface\Repository\BillPaymentDetailRepositoryInterface;
use App\Interface\Repository\BillPaymentRepositoryInterface;
use App\Interface\Repository\BillRepositoryInterface;
use App\Interface\Repository\CustomerRepositoryInterface;
use App\Interface\Repository\EmployeeRepositoryInterface;
use App\Interface\Repository\PaymentDetailRepositoryInterface;
use App\Interface\Repository\PaymentRepositoryInterface;
use App\Interface\Repository\ProductCategoryRepositoryInterface;
use App\Interface\Repository\ProductRepositoryInterface;
use App\Interface\Repository\SalesInvoiceDetailRepositoryInterface;
use App\Interface\Repository\SalesInvoiceRepositoryInterface;
use App\Interface\Repository\SupplierRepositoryInterface;
use App\Interface\Repository\UserRepositoryInterface;
use App\Interface\Service\AuthServiceInterface;
use App\Interface\Service\BillDetailServiceInterface;
use App\Interface\Service\BillPaymentChequeServiceInterface;
use App\Interface\Service\BillPaymentDetailServiceInterface;
use App\Interface\Service\BillPaymentServiceInterface;
use App\Interface\Service\BillServiceInterface;
use App\Interface\Service\CustomerServiceInterface;
use App\Interface\Service\EmployeeServiceInterface;
use App\Interface\Service\PaymentDetailServiceInterface;
use App\Interface\Service\PaymentServiceInterface;
use App\Interface\Service\ProductCategoryServiceInterface;
use App\Interface\Service\ProductServiceInterface;
use App\Interface\Service\SalesInvoiceDetailServiceInterface;
use App\Interface\Service\SalesInvoiceServiceInterface;
use App\Interface\Service\SupplierServiceInterface;
use App\Interface\Service\UserServiceInterface;
use App\Repository\BillDetailRepository;
use App\Repository\BillPaymentChequeRepository;
use App\Repository\BillPaymentDetailRepository;
use App\Repository\BillPaymentRepository;
use App\Repository\BillRepository;
use App\Repository\CustomerRepository;
use App\Repository\EmployeeRepository;
use App\Repository\PaymentDetailRepository;
use App\Repository\PaymentRepository;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\SalesInvoiceDetailRepository;
use App\Repository\SalesInvoiceRepository;
use App\Repository\SupplierRepository;
use App\Repository\UserRepository;
use App\Service\AuthService;
use App\Service\BillDetailService;
use App\Service\BillPaymentChequeService;
use App\Service\BillPaymentDetailService;
use App\Service\BillPaymentService;
use App\Service\BillService;
use App\Service\CustomerService;
use App\Service\EmployeeService;
use App\Service\PaymentDetailService;
use App\Service\PaymentService;
use App\Service\ProductCategoryService;
use App\Service\ProductService;
use App\Service\SalesInvoiceDetailService;
use App\Service\SalesInvoiceService;
use App\Service\SupplierService;
use App\Service\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Repository
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(BillRepositoryInterface::class, BillRepository::class);
        $this->app->bind(BillDetailRepositoryInterface::class, BillDetailRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(PaymentDetailRepositoryInterface::class, PaymentDetailRepository::class);
        $this->app->bind(SalesInvoiceRepositoryInterface::class, SalesInvoiceRepository::class);
        $this->app->bind(SalesInvoiceDetailRepositoryInterface::class, SalesInvoiceDetailRepository::class);
        $this->app->bind(BillPaymentRepositoryInterface::class, BillPaymentRepository::class);
        $this->app->bind(BillPaymentDetailRepositoryInterface::class, BillPaymentDetailRepository::class);
        $this->app->bind(BillPaymentChequeRepositoryInterface::class, BillPaymentChequeRepository::class);

        //Service
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ProductCategoryServiceInterface::class, ProductCategoryService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(EmployeeServiceInterface::class, EmployeeService::class);
        $this->app->bind(SupplierServiceInterface::class, SupplierService::class);
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(BillServiceInterface::class, BillService::class);
        $this->app->bind(BillDetailServiceInterface::class, BillDetailService::class);
        $this->app->bind(PaymentServiceInterface::class, PaymentService::class);
        $this->app->bind(PaymentDetailServiceInterface::class, PaymentDetailService::class);
        $this->app->bind(SalesInvoiceServiceInterface::class, SalesInvoiceService::class);
        $this->app->bind(SalesInvoiceDetailServiceInterface::class, SalesInvoiceDetailService::class);
        $this->app->bind(BillPaymentServiceInterface::class, BillPaymentService::class);
        $this->app->bind(BillPaymentDetailServiceInterface::class, BillPaymentDetailService::class);
        $this->app->bind(BillPaymentChequeServiceInterface::class, BillPaymentChequeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
