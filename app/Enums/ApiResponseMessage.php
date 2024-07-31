<?php

namespace App\Enums;

enum ApiResponseMessage: string
{
    case SUCCESS = 'Operation successful';
    case ERROR = 'Operation failed';
    case NOT_FOUND = 'Resource not found';
    case PRODUCT_CREATED = 'Product created successfully';
    case PRODUCT_UPDATED = 'Product updated successfully';
    case PRODUCT_DELETED = 'Product deleted successfully';
    case CATEGORY_CREATED = 'Category Created successfully';
    case CATEGORY_DELETED = 'Category deleted successfully';
    case CATEGORY_NOT_FOUND = 'Category not found';
    case AUTHENTICATED = 'Authenticated';
    case LOGGED_OUT = 'Logged out';
    case CREDENTIALS_INCORRECT = 'The provided credentials are incorrect.';
}
