import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, tap } from 'rxjs/operators';
import { Product } from '../models/product';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  private baseUrl = 'http://localhost:8080/api/products';
  private httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Access-Control-Allow-Origin': '*'
    }),
    withCredentials: false
  };

  constructor(private http: HttpClient) { }

  getAll(): Observable<Product[]> {
    console.log('Fetching all products from:', this.baseUrl);
    return this.http.get<Product[]>(this.baseUrl, this.httpOptions).pipe(
      tap(response => {
        console.log('Raw API response:', response);
      }),
      catchError(this.handleError)
    );
  }

  get(id: number): Observable<Product> {
    return this.http.get<Product>(`${this.baseUrl}/${id}`, this.httpOptions).pipe(
      tap(response => console.log('Get product response:', response)),
      catchError(this.handleError)
    );
  }

  create(product: Product): Observable<Product> {
    return this.http.post<Product>(`${this.baseUrl}/add`, product, this.httpOptions).pipe(
      tap(response => console.log('Create product response:', response)),
      catchError(this.handleError)
    );
  }

  update(id: number, product: Product): Observable<Product> {
    console.log('Updating product:', { id, product });
    return this.http.put<Product>(`${this.baseUrl}/${id}`, product, this.httpOptions).pipe(
      tap(response => console.log('Update product response:', response)),
      catchError(this.handleError)
    );
  }

  updatePrice(id: number, price: number): Observable<void> {
    return this.http.patch<void>(`${this.baseUrl}/${id}/prix`, null, {
      ...this.httpOptions,
      params: { prix: price.toString() }
    }).pipe(
      tap(response => console.log('Update price response:', response)),
      catchError(this.handleError)
    );
  }

  delete(id: number): Observable<void> {
    return this.http.delete<void>(`${this.baseUrl}/${id}`, this.httpOptions).pipe(
      tap(response => console.log('Delete product response:', response)),
      catchError(this.handleError)
    );
  }

  deleteAll(): Observable<any> {
    return this.http.delete(this.baseUrl, this.httpOptions).pipe(
      tap(response => console.log('Delete all response:', response)),
      catchError(this.handleError)
    );
  }

  findByNom(nom: string): Observable<Product[]> {
    return this.http.get<Product[]>(`${this.baseUrl}?nom=${nom}`, this.httpOptions).pipe(
      tap(response => console.log('Search by name response:', response)),
      catchError(this.handleError)
    );
  }

  private handleError(error: HttpErrorResponse) {
    console.error('API Error details:', {
      status: error.status,
      statusText: error.statusText,
      url: error.url,
      error: error.error,
      message: error.message
    });

    if (error.status === 0) {
      // Check if it's a CORS error
      if (error.error instanceof ProgressEvent && error.error.type === 'error') {
        console.error('This appears to be a CORS error. Make sure your backend has CORS enabled.');
        return throwError(() => 'Unable to connect to the server. This might be a CORS issue. Check that your backend has CORS enabled.');
      }
      return throwError(() => 'Cannot connect to the server. Please check if the backend is running.');
    }
    
    if (error.status === 404) {
      return throwError(() => 'The requested resource was not found.');
    }
    
    if (error.error instanceof ErrorEvent) {
      // Client-side error
      return throwError(() => error.error.message);
    }
    
    if (error.error && typeof error.error === 'object') {
      // Try to get a meaningful message from the error response
      const message = error.error.message || error.error.error || error.message;
      return throwError(() => message);
    }
    
    // Server-side error
    return throwError(() => `Server returned code ${error.status}. Error message: ${error.message}`);
  }
}
