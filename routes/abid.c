#include <HTTPClient.h>
#include <WiFi.h>
#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 21
#define RST_PIN 22

const int Relay = 14;
#define Buzzer 15
 
MFRC522 rfid(SS_PIN, RST_PIN);
MFRC522::MIFARE_Key key;

char *myStrings[] = {"A3356F1A", "C9D29255", "5917DB56", "79AEC555", "A9B59155","83D93A2E","39C1D156","4934CE56","09E5C356"
                    };
String strID;
const char* ssid = "kambing"; //Ini ganti SSID (Nama Wifi yang samean koneksan sama hotspot
const char* password = "12345678"; //ini password wifi samean 
//String get_status_url = "http://192.168.137.1/rfidsatu/koneksirfid.php";
String get_status_url = "http://157.230.42.44:8000/daftar/";

void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  Serial.begin(9600);

  delay(4000);
  
  WiFi.begin(ssid, password);
  
  pinMode(Buzzer, OUTPUT); // Set buzzer pin to an Output pin
  pinMode(Relay, OUTPUT); // Set buzzer pin to an Output pin
  digitalWrite(Buzzer, LOW); // Buzzer Off at startup
  digitalWrite (Relay, LOW) ;// Buzzer On
  SPI.begin();
  rfid.PCD_Init();
  Serial.begin(9600);
  //Serial.println("I am waiting for card...");
  
  while (WiFi.status() != WL_CONNECTED) {
  delay(1000);
  Serial.println("Connecting to WiFi..");
  }
  Serial.println("Connected to the WiFi network");
  
  Serial.println("I am waiting for card...");
}

 
void loop() {
  if (!rfid.PICC_IsNewCardPresent() || !rfid.PICC_ReadCardSerial())
    return;
  // Serial.print(F("PICC type: "));
  MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);
  // Serial.println(rfid.PICC_GetTypeName(piccType));
 
  // Check is the PICC of Classic MIFARE type
  if (piccType != MFRC522::PICC_TYPE_MIFARE_MINI &&
      piccType != MFRC522::PICC_TYPE_MIFARE_1K &&
      piccType != MFRC522::PICC_TYPE_MIFARE_4K) {
        Serial.println(F("Your tag is not of type MIFARE Classic."));
        return;
  }
   
    //id kartu dan yang akan dikirim ke database
  strID = "";
  for (byte i = 0; i < 4; i++) {
      strID +=
      (rfid.uid.uidByte[i] < 0x10 ? "0" : "") +
      String(rfid.uid.uidByte[i], HEX) +
      (i != 3 ? "" : "");
     // 
  }
  strID.toUpperCase();
  Serial.print("Kartu ID Anda : ");
  Serial.println(strID);
  digitalWrite (Buzzer, LOW) ;// Buzzer On
  delay (2000) ;// Delay 1ms 
  digitalWrite (Buzzer, HIGH) ;
  delay (500) ;
  digitalWrite (Buzzer, LOW) ;// Buzzer On
  delay (300) ;// Delay 1ms 
  
  digitalWrite (Relay, LOW) ;// Buzzer On
  delay (1000) ;// Delay 1ms 
  digitalWrite (Relay, HIGH) ;// Buzzer On
  delay (2000) ;// Delay 1ms
  digitalWrite (Relay, LOW) ;// Buzzer On
  delay (1000) ;// Delay 1ms 
  koneksi_database();
  delay(5000);
  delay(500);
}

void koneksi_database(){
  if ((WiFi.status() == WL_CONNECTED)) { //Check the current connection status
 
  HTTPClient http;
  String url = get_status_url+strID;
  http.begin(url);
  int httpCode = http.GET();                                        //Make the request
     if (httpCode > 0) { //Check for the returning code
          String payload = http.getString();
          Serial.println(httpCode);
         Serial.println(payload);
        }
   
      else {
            Serial.println("Error on HTTP request");
          }
      http.end(); //Free the resources
    }
  }