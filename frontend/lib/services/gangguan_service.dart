import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/gangguan_model.dart';

class GangguanService {
  static const String baseUrl =
      'YOUR_API_BASE_URL'; // Ganti dengan URL API Anda

  // ✅ Submit log gangguan baru
  static Future<Map<String, dynamic>> submitLogGangguan({
    required int laporanId,
    required String token,
    required GangguanModel gangguan,
  }) async {
    try {
      final url = Uri.parse('$baseUrl/api/laporan/$laporanId/log-gangguan');

      final response = await http.post(
        url,
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer $token',
        },
        body: jsonEncode(gangguan.toJson()),
      );

      final responseData = jsonDecode(response.body);

      if (response.statusCode == 201) {
        // ✅ Sukses (201 Created)
        return {
          'success': true,
          'message':
              responseData['message'] ?? 'Log gangguan berhasil ditambahkan',
          'data':
              responseData['data'] != null
                  ? GangguanModel.fromJson(responseData['data'])
                  : null,
        };
      } else if (response.statusCode == 403) {
        // ❌ Forbidden (403)
        throw Exception(
          responseData['message'] ??
              'Anda tidak memiliki izin untuk mengubah laporan ini',
        );
      } else if (response.statusCode == 422) {
        // ❌ Validation Error (422)
        String errorMessage = 'Data yang diberikan tidak valid';
        if (responseData['errors'] != null) {
          final errors = responseData['errors'] as Map<String, dynamic>;
          errorMessage = errors.values.first.join(', ');
        }
        throw Exception(errorMessage);
      } else if (response.statusCode == 401) {
        // ❌ Unauthorized (401)
        throw Exception('Sesi Anda telah berakhir. Silakan login kembali');
      } else {
        throw Exception(
          responseData['message'] ?? 'Gagal mengirim data gangguan',
        );
      }
    } catch (e) {
      if (e.toString().contains('Exception:')) {
        rethrow;
      }
      throw Exception('Terjadi kesalahan: ${e.toString()}');
    }
  }

  // ✅ Get list log gangguan (opsional, jika ada endpoint GET)
  static Future<List<GangguanModel>> getLogGangguan({
    required int laporanId,
    required String token,
  }) async {
    try {
      final url = Uri.parse('$baseUrl/api/laporan/$laporanId/log-gangguan');

      final response = await http.get(
        url,
        headers: {'Authorization': 'Bearer $token'},
      );

      if (response.statusCode == 200) {
        final responseData = jsonDecode(response.body);
        final List<dynamic> data = responseData['data'] ?? [];
        return data.map((json) => GangguanModel.fromJson(json)).toList();
      } else {
        throw Exception('Gagal memuat data gangguan');
      }
    } catch (e) {
      throw Exception('Terjadi kesalahan: ${e.toString()}');
    }
  }
}
