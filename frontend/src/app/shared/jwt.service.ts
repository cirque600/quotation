import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export class User {
  name: String;
  email: String;
  password: String;
  password_confirmation: String;
}

export class Quote {
  age: String;
  start_date: String;
  end_date: String;
  currency: String;
}

@Injectable({
  providedIn: 'root'
})

export class JwtService {

  constructor(private http: HttpClient) { }

  register(user: User): Observable<any> {
    return this.http.post('http://127.0.0.1:8000/api/register', user);
  }

  login(user: User): Observable<any> {
    return this.http.post<any>('http://127.0.0.1:8000/api/login', user);
  }

  quote(quote: Quote): Observable<any>{
    return this.http.post<any>('http://127.0.0.1:8000/api/login', quote);
  }
}
