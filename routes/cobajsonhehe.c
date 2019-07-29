#include <ArduinoJson.h>
#include <Ethernet.h>
#include <Wifi.h>
#include <SPI.h>

const char* ssid = "kambing";
const char* password = "12345678";

void setup() {
  // Initialize Serial port
  Serial.begin(115200);
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting...");
  }

  // Connect to HTTP server
  WiFiClient client;
  client.setTimeout(10000);
  if (!client.connect("arduinojson.org", 80)) {
    Serial.println(F("Connection failed"));
    return;
  }

  Serial.println(F("Connected!"));

  // Send HTTP request
  client.println(F("GET /example.json HTTP/1.0"));
  client.println(F("Host: arduinojson.org"));
  client.println(F("Connection: close"));
  if (client.println() == 0) {
    Serial.println(F("Failed to send request"));
    return;
  }

  // Check HTTP status
  char status[32] = {0};
  client.readBytesUntil('\r', status, sizeof(status));
  if (strcmp(status, "HTTP/1.1 200 OK") != 0) {
    Serial.print(F("Unexpected response: "));
    Serial.println(status);
    return;
  }

  // Skip HTTP headers
  char endOfHeaders[] = "\r\n\r\n";
  if (!client.find(endOfHeaders)) {
    Serial.println(F("Invalid response"));
    return;
  }

  // Allocate the JSON document
  // Use arduinojson.org/v6/assistant to compute the capacity.
  const size_t capacity = JSON_OBJECT_SIZE(3) + JSON_ARRAY_SIZE(2) + 60;
  DynamicJsonDocument doc(capacity);

  // Parse JSON object
  DeserializationError error = deserializeJson(doc, client);
  if (error) {
    Serial.print(F("deserializeJson() failed: "));
    Serial.println(error.c_str());
    return;
  }

  // Extract values
  Serial.println(F("Response:"));
  Serial.println(doc["sensor"].as<char*>());
  Serial.println(doc["time"].as<long>());
  Serial.println(doc["data"][0].as<float>(), 6);
  Serial.println(doc["data"][1].as<float>(), 6);

  // Disconnect
  client.stop();
}

void loop() {
  // Check WiFi Status
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;  //Object of class HTTPClient
    // http.begin("http://157.230.42.44:8000/cekpintu");
    // int httpCode = http.GET();
    // //Check the returning code                                                                  
    // if (httpCode > 0) {
    //   // Get the request response payload
    //   String payload = http.getString();
    //   // TODO: Parsing
    // }
    // http.end();   //Close connection
  }
  // Delay
  delay(60000);
}