import 'package:dio/dio.dart';
import '../../../core/api/api_client.dart';

class AuthService {
  final Dio _dio = ApiClient().dio;

  Future<Response> login({
    required String email,
    required String password,
  }) async {
    return await _dio.post(
      '/login',
      data: {
        'email': email,
        'password': password,
      },
    );
  }

  Future<Response> register({
    required String name,
    required String email,
    required String phone,
    required String password,
    required String role,
  }) async {
    return await _dio.post(
      '/register',
      data: {
        'name': name,
        'email': email,
        'phone': phone,
        'password': password,
        'role': role,
      },
    );
  }
}