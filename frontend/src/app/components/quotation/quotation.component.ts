import { Component, OnInit } from '@angular/core';

import { FormBuilder, FormGroup } from "@angular/forms";

import { JwtService } from './../../shared/jwt.service';


@Component({
  selector: 'app-quotation',
  templateUrl: './quotation.component.html',
  styleUrls: ['./quotation.component.css']
})
export class QuotationComponent implements OnInit {

  quotationForm: FormGroup;
  err = null;

  constructor(
    public fb: FormBuilder,
    public jwtService: JwtService,

    )
    {
      this.quotationForm = this.fb.group({
        email: [],
        password: []
      })
     }

  ngOnInit(): void {
  }

  onSubmit(): void {

  }

}
