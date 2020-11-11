
#include <iostream>

using namespace std;

int main(){
	int a,b,c;
	
	cout <<"Masukan Bilangan A =";
	cin >> a;
	
	cout <<"Masukan Bilangan B =";
	cin >> b;
	
	cout <<"Masukan Bilangan C =";
	cin >> c;
	
	if (a < b and a < c){
		cout << " Bilangan Terkecil adalah "<<a;
	}
	
	else if (a < c and a < c){
		cout << " Bilangan Terkecil adalah "<<b;
	}	
	
	else { cout <<" Bilangan Terkecil adalah "<<c;
	}
	
	return 0;
}