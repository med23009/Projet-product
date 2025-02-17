import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Product } from 'src/app/models/product';
import { ProductService } from 'src/app/services/product.service';

@Component({
  selector: 'app-add-product',
  templateUrl: './add-product.component.html',
  styleUrls: ['./add-product.component.css']
})
export class AddProductComponent {
  product: Product = {
    nom: '',
    description: '',
    prix: 0,
    publication: false
  };
  submitted = false;

  constructor(
    private productService: ProductService,
    private router: Router
  ) { }

  saveProduct(): void {
    const data = {
      nom: this.product.nom,
      description: this.product.description,
      prix: this.product.prix,
      publication: this.product.publication
    };

    this.productService.create(data)
      .subscribe({
        next: (res) => {
          console.log('Product created:', res);
          this.submitted = true;
          // Redirect to products list after 2 seconds
          setTimeout(() => {
            this.router.navigate(['/products']);
          }, 2000);
        },
        error: (e) => console.error('Error creating product:', e)
      });
  }

  newProduct(): void {
    this.submitted = false;
    this.product = {
      nom: '',
      description: '',
      prix: 0,
      publication: false
    };
  }
}
