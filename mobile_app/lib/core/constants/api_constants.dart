import 'package:flutter/foundation.dart';

class ApiConstants {
  // Change this ONLY when testing on a physical phone.
  static const String _phoneIp = '192.168.1.100';

  static String get baseUrl {
    if (kIsWeb) {
      // Chrome / Edge / Firefox
      return 'http://127.0.0.1:8000/api';
    }

    // Android emulator
    return 'http://10.0.2.2:8000/api';

    // Physical phone (we'll enable this when needed)
    // return 'http://$_phoneIp:8000/api';
  }
}