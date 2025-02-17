import { Component, OnInit } from '@angular/core';
import { Product } from 'src/app/models/product';
import { ProductService } from 'src/app/services/product.service';

@Component({
  selector: 'app-products-list',
  templateUrl: './products-list.component.html',
  styleUrls: ['./products-list.component.css']
})
export class ProductsListComponent implements OnInit {
  products: Product[] = [];
  currentProduct: Product = {};
  currentIndex = -1;
  nom = '';
  loading = false;
  error = '';

  constructor(private productService: ProductService) { }

  ngOnInit(): void {
    this.retrieveProducts();
  }

  retrieveProducts(): void {
    this.loading = true;
    this.error = '';
    this.products = [];

    this.productService.getAll()
      .subscribe({
        next: (data: Product[]) => {
          console.log('Products received:', data);
          if (Array.isArray(data)) {
            this.products = data;
          } else {
            console.error('Unexpected response format:', data);
            this.error = 'Received invalid data format from server';
          }
          this.loading = false;
        },
        error: (error: any) => {
          console.error('Error fetching products:', error);
          this.error = typeof error === 'string' ? error : 'Failed to load products';
          this.loading = false;
        }
      });
  }

  refreshList(): void {
    this.retrieveProducts();
    this.currentProduct = {};
    this.currentIndex = -1;
  }

  setActiveProduct(product: Product, index: number): void {
    this.currentProduct = { ...product };
    this.currentIndex = index;
  }

  removeAllProducts(): void {
    this.loading = true;
    this.error = '';

    this.productService.deleteAll()
      .subscribe({
        next: () => {
          console.log('All products deleted successfully');
          this.refreshList();
        },
        error: (error: any) => {
          console.error('Error deleting products:', error);
          this.error = typeof error === 'string' ? error : 'Failed to delete products';
          this.loading = false;
        }
      });
  }

  searchName(): void {
    if (!this.nom.trim()) {
      this.retrieveProducts();
      return;
    }

    this.currentProduct = {};
    this.currentIndex = -1;
    this.loading = true;
    this.error = '';
    this.products = [];

    this.productService.findByNom(this.nom)
      .subscribe({
        next: (data: Product[]) => {
          console.log('Search results:', data);
          if (Array.isArray(data)) {
            this.products = data;
          } else {
            console.error('Unexpected search response format:', data);
            this.error = 'Received invalid data format from server';
          }
          this.loading = false;
        },
        error: (error: any) => {
          console.error('Error searching products:', error);
          this.error = typeof error === 'string' ? error : 'Failed to search products';
          this.loading = false;
        }
      });
  }
}
