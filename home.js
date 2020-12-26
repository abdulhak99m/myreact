import React, { Component } from 'react';
  import axios from 'axios';
  import ImageUploader from 'react-images-upload';
  class Home extends React.Component{
      constructor(props) {
          super(props);
          
          this.addFormData = this.addFormData.bind(this);
        }
    addFormData(evt)
      {
        evt.preventDefault();
      const fd = new FormData();
      fd.append('myFirstname', this.refs.myFirstname.value);
      fd.append('myLastname', this.refs.myLastname.value);
      fd.append('mynoShoes', this.refs.mynoShoes.value);
      fd.append('myEmail', this.refs.myEmail.value);
      fd.append('myPhone', this.refs.myPhone.value);
      fd.append('myDate', this.refs.myDate.value);
      var headers = {
              'Content-Type': 'application/json;charset=UTF-8',
              "Access-Control-Allow-Origin": "*"
          }
      axios.post('http://localhost/heartreact/core_php.php', fd, headers
      ).then(res=>
      {
       alert(res.data.data);
      }
      );
      
    }
    handleReset = () => {
      Array.from(document.querySelectorAll("input")).forEach(
        input => (input.value = "")
      );
      this.setState({
        itemvalues: [{}]
      });
    };
  
  
    render() {
      return (
          
    <div>
      <p>Home</p> 
    <h5>Enter Donors Data:</h5>
  
    <form>
      <div className="form-group">
      <input type="text" className="form-control" id="Firstname" placeholder="First Name" ref="myFirstname" />
      </div>
      <div className="form-group">
      <input type="text" className="form-control" id="Lastname" placeholder="Last Name" ref="myLastname" />
      </div>
      <div className="form-group">
      <input type="Number" className="form-control" id="NoShoes" placeholder="Number of Shoes Donated" ref="mynoShoes" />
      </div>
      <div className="form-group">
      <input type="email" className="form-control" id="Email" aria-describedby="emailHelp" placeholder="Email" ref="myEmail" />
      <small id="emailHelp" className="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div className="form-group">
      <input type="text" className="form-control" id="Phone" placeholder="Phone Number" ref="myPhone" />
      </div>
      <div className="form-group">
      <input type="date" className="form-control" id="Date" placeholder="Date Donated" ref="myDate" />
      </div> 
      <button type="submit" className="btn btn-primary" onClick={this.addFormData}>Submit</button>
      <button type="reset" className="btn btn-primary" onClick={this.handleReset}>Reset</button>
    </form>
    <br/>
    </div>
    
      );
    }
    }
    export default Home;
