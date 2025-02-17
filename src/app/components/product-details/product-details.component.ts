import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Product } from 'src/app/models/product';
import { ProductService } from 'src/app/services/product.service';

@Component({
  selector: 'app-product-details',
  templateUrl: './product-details.component.html',
  styleUrls: ['./product-details.component.css']
})
export class ProductDetailsComponent implements OnInit {
  currentProduct: Product = {
    nom: '',
    description: '',
    prix: 0,
    publication: false
  };
  message = '';
  error = '';
  loading = false;
  updateSuccess = false;

  constructor(
    private productService: ProductService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.loading = true;
    this.message = '';
    this.getProduct(this.route.snapshot.params['id']);
  }

  getProduct(id: string): void {
    this.productService.get(+id)
      .subscribe({
        next: (data) => {
          this.currentProduct = data;
          this.loading = false;
          console.log('Product loaded:', data);
        },
        error: (e) => {
          console.error('Error loading product:', e);
          this.error = 'Error loading product details';
          this.loading = false;
        }
      });
  }

  updateProduct(): void {
    this.loading = true;
    this.message = '';
    this.error = '';

    this.productService.update(this.currentProduct.id!, this.currentProduct)
      .subscribe({
        next: (response) => {
          console.log('Update response:', response);
          this.message = 'Product was updated successfully!';
          this.updateSuccess = true;
          this.loading = false;
          
          // Redirect to products list after 2 seconds
          setTimeout(() => {
            this.router.navigate(['/products']);
          }, 2000);
        },
        error: (e) => {
          console.error('Error updating product:', e);
          this.error = 'Error updating the product';
          this.loading = false;
          this.updateSuccess = false;
        }
      });
  }

  deleteProduct(): void {
    if (confirm('Are you sure you want to delete this product?')) {
      this.loading = true;
      this.message = '';
      this.error = '';

      this.productService.delete(this.currentProduct.id!)
        .subscribe({
          next: () => {
            this.loading = false;
            this.router.navigate(['/products']);
          },
          error: (e) => {
            console.error('Error deleting product:', e);
            this.error = 'Error deleting the product';
            this.loading = false;
          }
        });
    }
  }

  updatePublication(status: boolean): void {
    if (this.currentProduct.id === undefined) {
      console.error('Cannot update: product id is undefined');
      return;
    }

    const data = {
      ...this.currentProduct,
      publication: status
    };

    this.productService.update(this.currentProduct.id, data)
      .subscribe({
        next: (res) => {
          this.currentProduct.publication = status;
          console.log('Product publication updated:', res);
          this.message = `Product ${status ? 'published' : 'unpublished'} successfully!`;
          this.updateSuccess = true;
        },
        error: (e) => {
          console.error('Error updating publication status:', e);
          this.error = 'Failed to update publication status';
          this.updateSuccess = false;
        }
      });
  }
}