#include <WiFi.h>
#include <SPI.h>
#include <ArduinoJson.h>

// WiFi Parameters
const char* ssid = "kambing";
const char* password = "12345678";

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting...");
  }
}

void loop() {
  // Check WiFi Status
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;  //Object of class HTTPClient
    http.begin("http://157.230.42.44:8000/cekpintu");
    int httpCode = http.GET();
    //Check the returning code                                                                  
    if (httpCode > 0) {
      // Get the request response payload
      String payload = http.getString();
      // TODO: Parsing
    }
    http.end();   //Close connection
  }
  // Delay
  delay(60000);
}