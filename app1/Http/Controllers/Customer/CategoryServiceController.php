<?php

namespace App\Http\Controllers\Customer;

use Illuminate\View\View;
use App\Models\Customer\Rating;
use App\Models\Service\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Service\ServiceCategory;
use App\Repositories\Customer\CategoryProductsRepository;
use App\Repositories\Customer\CategoryServicesRepository;

class CategoryServiceController extends Controller
{
  protected $CategoryServicesRepository;
  protected $CategoryProductsRepository;

  public function __construct(CategoryServicesRepository $CategoryServicesRepository, CategoryProductsRepository $CategoryProductsRepository)
  {
    $this->CategoryServicesRepository = $CategoryServicesRepository;
    $this->CategoryProductsRepository = $CategoryProductsRepository;
  }

  public function services(string $categoryName, int $categoryId): View
  {
    $category = ServiceCategory::find($categoryId);

    $services = $this->CategoryServicesRepository->getCategoryServices($categoryId);

    $parentCategoryId = $this->CategoryProductsRepository->getParentCategory($category);

    $filters = $this->CategoryServicesRepository->getCategoryFilters($categoryId);

    $maxPrice  = $this->CategoryServicesRepository->getMinAndMaxPrice($services)['maxPrice'];
    $minPrice = $this->CategoryServicesRepository->getMinAndMaxPrice($services)['minPrice'];

    return view('customer.services.category-services', compact('services', 'category', 'maxPrice', 'minPrice', 'filters'));
  }

  public function ServiceDetail(string $serviceName, int $serviceId): View
  {
    $service = Service::find($serviceId);

    $haveIRated = (Auth::guard('buyer')->check()) ? Rating::where([
      ['product_id', '=', $serviceId], ['type', '=', 'service'], ['user_id', '=', Auth::guard('buyer')->user()->id]
    ])->exists() : false;

    return view('customer.services.service-detail', compact('service', 'haveIRated'));
  }
}
